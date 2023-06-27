<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    background-color: rgba(240, 245, 243, 0);
}

.container {
    width: 80%;
    margin: 50px 50px 30px 40px;
margin-left: 154px;
}
.contactact-box{
    background: rgb(222, 216, 216);
    display: flex;
}
.contact-left{
    flex-basis: 60%;
    padding: 40px 60px;
    background: #ccc;
}
.contact-right{
    flex-basis: 60%;
    padding: 48px;
    background-color:whitesmoke;
}
h1{
    margin-bottom: 20px;
}
.container p{
    margin-bottom: 20px;
}
.input-row{
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}
.input-group .input-row{
      flex-basis: 45%;
}
input{
    width: 100%;
    border: none;
    border-bottom: 1px solid #ccc;
    outline: none;
    padding-bottom: 5px;
}
textarea{
    width: 80%;
    border: 1px solid #ccc;
    outline: none;
    padding: 10px;
    box-sizing: border-box;
}
label{
    margin-bottom: 6px;
    display: block;
    color: #1c00b5;
}
button{
    width:100px;
    outline: none;
    border: none;
    background:#1c00b5;
    color: #fff;
    height: 30px;
    border-radius: 30px;
    transition: 0.3s;
    margin-top: 20px;
    box-shadow: 0px 5px 15px rgba(28,0,181,0.3);
   
    
}
button:hover{
    background-color: red;
    font-weight: bolder;
    font-style: italic;
}
.contact-left h3{
    color:#1c00b5 ;
    font-weight: 600;
}
.contact-right h3{
    color:#1c00b5 ;
    font-weight: 600;
}
tr rd:first-child{
    padding-right: 20px;
}
tr td{
    padding-top: 20px;
}
    </style>
</head>
<body>
    <div class="container">
    <h1>Connect With US</h1>
    <p>We would love to respond your queries and help you suceed. feel 
        free to get in touch with us.....
    </p>
    <div class="contactact-box">
        <div class="contact-left">
            <h3>Sent Your request</h3>
            <form  action="contact.php" method="post">
                <div class="input-row">
                    <div class="input-group">
                        <label for="">Name</label>
                        <input type="text"placeholder="Enter your name" name="name">
                    </div>
                    <div class="input-group">
                        <label for="">phone</label>
                        <input type="text"placeholder="+91 55 444 4398" name="mobile">
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group">
                        <label for="">Email</label>
                        <input type="email"placeholder="mail" name="mail">
                    </div>
                    <div class="input-group">
                        <label for="">Subject</label>
                        <input type="text"placeholder="Enter your query" name="query">
                    </div>
                </div>
                <label>Message</label>
                <textarea rows="5"placeholder="write your query" name="desc"></textarea>
                <button type="submit" name="send">SEND</button>
            </form>
           

        </div>
        <div class="contact-right">
            <h3>Reach US</h3>
            <table>
                <tr>
                    <td>Email</td>
                    <td>Contact US-debshispandadipu@gmail.com</td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td>775189809</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>#212,Ground<br>
                    bhadrak,756121 </td>
                </tr>
            </table>

        </div>
    </div>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['send'])){
    
}

?>