<html>

<head>
    <title>HTML5 Contact Form</title>
    
    <link rel="stylesheet" media="screen" href="operator.css" >
    <link rel="stylesheet" type="text/css" href="css/Layout0.css"/>
    <link rel="stylesheet" type="text/css" href="css/Admin.css"/>
    <link rel="stylesheet" type="text/css" href="css/iframe.css"/>

</head>

<body>
<section class="container">
    
    <form class="contact_form" action="send_mail.php" method="post" name="contact_form" enctype="multipart/form-data" >
    
    <ul>
        <li>
             <h2 >Send Report</h2>
             <span class="required_notification">* Denotes Required Field</span>
        </li>
        <li>
            <label id="Name">Sender's name:</label>
            <input type="text"  name="name" id="name" placeholder="John Doe" required />
        </li>
        <li>
            <label id="sEmail">Sender's email:</label>
            <input type="email" name="semail" id="semail" placeholder="john_doe@example.com" required />
            <span class="form_hint">Proper format "name@something.com"</span>
        </li>
        <li>
            <label id="psWord">Password:</label>
            <input type="password" name="psword" id="psword" placeholder="myPassword1234" required />
        </li>
        <li>
            <label id="rEmail">Reciepent's email:</label>
            <input type="email" name="remail" id="remail" placeholder="john_doe@example.com" required />
            <span class="form_hint">Proper format "name@something.com"</span>
        </li>
        <li>
            <label id="subject">Subject:</label>
            <input type="text" name="sub" name="sub" placeholder="Subject" required />
        </li>
        <li>
            <label id="messageBody">Report Text:</label>
            <textarea name="message" id="message" rows="8" cols="100" required style="position: absolute; top: 30px; left: 196px; height:100px;"></textarea><br>
            <span class="tab"></span>
            <span class="jqFont" name="countchars" id="countchars"></span>
            <div class="jqFont" style="position: absolute; left:200px; top:145px;">&nbspCharacters Remaining
            </div>
        </li>
        <li> 
            <label id="attach">Upload: </label>
            <input type="file" name="file" id="file" style="position: absolute; left:60px; top:70px;">    
        </li>
        <li>
            <button class="submit" type="submit" style="position: absolute; left:80px; top:80px;">Submit Form</button>
        </li>
    </ul>
</form>
</section>
</body>
</html>