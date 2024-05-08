<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM userfb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Admin - View Feedback</title>
       
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;1,200&display=swap');



*,*::before, *::after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body{
   font-family: "Poppins",sans-serif;
   background: 
   url("menu/wallhaven-2e7mm6.jpg") no-repeat center center fixed, 
   url("background/wallhaven-13rq19.jpg") no-repeat center center fixed; 
   background-size: cover;
    position: relative;
    /*font-family: Arial, sans-serif;*/
    background-color: #fff; 
    transition: background-color 0.3s ease; 
   
}

::selection{
    background-color: #0b372d;
}

.logo{
    width: 100px;
}

header{
    position: fixed;
    z-index: 9999;
    width: 100%;
    padding: 0.09rem 0;
    top: 0;
    left: 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.318);
}
header nav{
   /* background-color: rgb(255, 255, 255);*/
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header ul{
    display: flex;
    list-style: none;
    align-items: center;

}

header ul a{
text-decoration: none;
color: #FFF;
padding: 0 1.5rem;
text-transform: uppercase;
font-weight: 300;
font-size: 0.83rem;

}

.search a{
    font-size: 1.05rem;
    padding: 0 3rem;
}

.hambeger{
    padding-left: 1.5rem;

}

.hambeger a{
    padding: 0;
    width: 37px;
    height: 37px;
    display: flex;
    border-radius: 50%;
    background-color: rgba(115, 115, 115, 0.7);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    justify-content: center;
    align-items: center;

}

/*.hambeger .bar{
    position: relative;
    width: 52%;
    height: 1.3px;
    background-color: #fff;
    border-radius: 2px;
}*/

.hambeger.bar::before,
.hambeger.bar::after{
    content: "";
    position: absolute;
    left: 50%;
    transform: translate(-50%);
    width: 60%;
    height: 100%;
    background-color: inherit;
    border-radius: 2px;
}

.hambeger.bar::before{
    top: -4.5px;
}

.hambeger.bar::after{
    top: 4.5px;

}


.search-form {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.search-button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
}


.search {
    margin-top: 20px;
}

.search-form {
    display: flex;
    align-items: center;
}

input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.search-button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
}

/*ul{
    float: right;
    list-style: none;
    margin-top: 20px;
    padding-right: 5px;
    padding: 0;
}
ul li{
    display: inline-block;
}*/

/*ul li a{
    color: #fff;
    text-decoration: none;
    padding: 5px 20px;
    font-size: 18px;
}*/

ul li a:hover{
    background: #fff;
    color: #333;

}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.reservation-table {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 60px;
    background-color: rgba(255, 255, 255, 0.9); 
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
}
th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 12px; 
    font-weight: bold; 
}
td {
    border-bottom: 1px solid #ddd;
    padding: 12px; 
}
tr:nth-child(even) {
    background-color: #f9f9f9;
}
h1 {
    text-align: center;
    font-family: Arial, sans-serif;
    color: #FFF;
    margin-top: 130px; 
    font-size: 2.5rem; 
}
a {
    text-decoration: none;
    color: #007bff; 
}
a:hover {
    text-decoration: underline;
}
            .delete-btn {
                background-color: #f44336;
                color: white;
                border: none;
                padding: 5px 10px;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
    <header>
     
     <nav>
         <img src="logo1.png" alt="Travelo" class="logo">
         <ul>
 
         <li>
                <a href="adminhome.html">Home</a>
            </li>
            <li>
                <a href="adminres.php">Room Reservation</a>
            </li>
            <li>
                <a href="admin_View_tableRes.php">Dining Appointment</a>
            </li>
            <li>
                <a href="admin_view_orders.php">Food Order</a>
            </li>

             <div class="search">
                 <form class="search-form">
                     <input type="text" placeholder="Search...">
                     <button type="submit" class="search-button">
                         <i class="fa-solid fa-magnifying-glass"></i>
                     </button>
                 </form>
             </div>
             <li class="hambeger">
                 <a href="logout.php">
                 <i class="fa-solid fa-briefcase"></i>
                     <div class="bar"></div>
                     <span id="loggedInUserName" style="display: none;"></span>
                 </a>
             </li>
             </li>
             
             <li class="hambeger">
                 <a href="#">
                     <i class="fa-solid fa-user"></i>
                  <div class="bar"></div>
                 </a>
              <li class="hambeger">
                     <a href="#">
                         <i class="fa-solid fa-gears"></i>
                      <div class="bar"></div>
                 </a>
                 
             </li>
         </ul>
     </nav>
 
   </header>
        <h1>User Feedback</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fullName'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo "<td><button class='delete-btn' data-id='" . $row['id'] . "'>Delete</button></td>";
                echo "</tr>";
            }
            ?>
        </table>

        <script>
           
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this record?')) {
                        
                        fetch(`delete_feedback.php?id=${id}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                  
                                    window.location.reload();
                                } else {
                                    alert('Failed to delete record');
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            });
        </script>
    </body>
    </html>
    <?php
} else {
    echo "No feedback found";
}

$conn->close();
?>
