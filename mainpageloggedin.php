<!--Check if session variable is set, if not set means user is not logged in.-->

<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Notes</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
    <style>
        #container{
            margin-top: 120px;
        }
        
        #addNote, #edit, #done, #allnotes{
            background-color: rgba(94,143,128, 0.8);
        }
        
        #allnotes, #done, #notePad, .delete{
            display: none;
        }
        
        .buttons{
           margin-bottom: 20px; 
        }
        
        textarea{
            width: 100%;
            max-width: 100%; /*Doesn't let textarea go out of width by pulling bottom right corner of text area*/
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #BA8549;
            color: #BA8549;
            background-color: #E7EACB;
            padding: 10px;
        }
        
        .noteheader{
            border: 1px solid #5E8F80;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 0 10px;
            background-color: #E7EACB;
        }
        
        .text{
            color: #BA8549;
            font-size: 20px;
            font-family: Arvo, serif;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        
        .timetext{
            color: #BA8549;
            font-size: 12px;
            font-family: Arvo, serif;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;           
        }
        
    </style>
  </head>
  <body>
    
      <!--Navigation Bar-->
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
          
            <div class="navbar-header">
                <a class="navbar-brand" href="mainpageloggedin.php" style="cursor: pointer">Online Notes</a>
                <button type="button" class="navbar-toggle" data-target="#navbar-collapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li class="active"><a href="#">My Notes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Logged in as <b><?php echo $_SESSION['username']?></b></a></li>
                    <li><a href="index.php?logout=1">Log Out</a></li>
                </ul>
            </div>  
        </div>
          
      </nav>
      
      <!--Container-->
      <div class="container" id="container">
          <!--Alert Message from createnote.php via mymotes.js-->
          <div id="alert" class="alert alert-danger collapse">
              <a class="close" data-dismiss="alert">
                &times;
              </a>
              <p id="alertContent"></p>
          </div>
          
          <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="buttons">
                    <button id="addNote" type="button" class="btn btn-info btn-lg">Add Note</button>
                    <button id="edit" type="button" class="btn btn-info btn-lg pull-right">Edit</button>
                    <button id="done" type="button" class="btn btn-info btn-lg pull-right">Done</button>
                    <button id="allnotes" type="button" class="btn btn-info btn-lg">All Notes</button>
                
                </div>  
                
                <div id="notePad">
                    <textarea rows="10"></textarea>
                </div>
                
                <div id="notes" class="notes">
                    <!--Ajax call to a php file-->
                </div>
            
                
            </div>
          </div>
      </div>
      
      
      
      <!--Footer-->
        <div class="footer">
            <div class="container">
                <p>Alhad @ OnlineNotes Inc Copyright &copy; <?php $today = date("Y"); echo $today ?></p>
            </div>
      
        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="mynotes.js"></script>
  </body>
</html>