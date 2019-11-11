<?php

$error = '';
$name = '';
$race_no = '';
$comp_no = '';
$time = '';
$category = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
    $name = clean_text($_POST["name"]);
    $race_no = clean_text($_POST["race_no"]);
    $comp_no = clean_text($_POST["comp_no"]);
    $time = clean_text($_POST["time"]);
    $category = clean_text($_POST["category"]);

	if($error == '')
	{
		$file_open = fopen("test.csv", "a");
		$no_rows = count(file("test.csv"));
		 if($no_rows > 1)
		{
			$no_rows = ($no_rows - 1) + 1;
		}

		$form_data = array(
            'Category' => $category,
            'Competition Number' => $comp_no,
            'Race Number' => $race_no,
            'Time' => $time,
            'Name' => $name
        );
        
		fputcsv($file_open, $form_data);
        $error = '<label class="text-success">Entry Submitted</label>';
        echo "<script type='text/javascript'>alert('Entry". $name ."');</script>";
        $error = '';
        $name = '';
        $race_no = '';
        $comp_no = '';
        $time = '';
        $category = '';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Admin - Entry Portal</title>
</head>
<body>
    <div class="container">
        <h3 class="display-4">INAC Qualifying Round 2019</h3>
        <p>Enter timing details</p>
        <form method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" required placeholder="Name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Time</label>
                    <input type="number" step="0.001" min="100" name="time" class="form-control" required placeholder="Time">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Race. No.</label>
                    <input type="number" name="race_no" class="form-control" required placeholder="Race. No.">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Comp. No.</label>
                    <input type="number" name="comp_no" class="form-control" required placeholder="Comp. No.">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Event Name</label>
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="category" required id="" class="form-control" >
                        <option value="" default>Category</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="C3">C3</option>
                        <option value="C4">C4</option>
                        <option value="C5">C5</option>
                        <option value="C6">C6</option>
                        <option value="C7">C7</option>
                        <option value="C8">C8</option>
                        <option value="C9">C9</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-primary py-3 px-5">
                  </div>
                </div>
              </div>
            </form>
        </div>  
</body>
</html>

