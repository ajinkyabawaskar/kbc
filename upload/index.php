<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Upload a question</title>
</head>
<body>
<div class="container mt-4">
    <div class="row mt-4">
        <div class="col-md-12 mt-3 pt-4">
        <form action="upload.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputId">Number</label>
                        <input type="text" name="id" class="form-control" id="inputId" placeholder="ID">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="inputQuestion">Question</label>
                        <input required type="text" name="question" class="form-control" id="inputQuestion" placeholder="Type question here">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputOption1">Option 1</label>
                        <input type="text" name="option1" class="form-control" id="inputOption1">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputOption2">Option 2</label>
                        <input type="text" name="option2" class="form-control" id="inputOption2">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputOption3">Option 3</label>
                        <input type="text" name="option3" class="form-control" id="inputOption3">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputOption4">Option 4</label>
                        <input type="text" name="option4" class="form-control" id="inputOption4">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAnswer">Answer</label>
                        <select required id="inputAnswer" name="answer" class="form-control">
                            <option value="null" selected>Choose...</option>
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                            <option value="option4">Option 4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="submit"></label>
                    </div>
                </div>
                <input type="submit" id="submit" class="btn btn-primary">                   
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>