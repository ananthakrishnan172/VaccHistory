<?php 
	
	session_start();
	require "includes/functions.php";
	require "includes/db.php";
    // if(!isset($_SESSION['username'])) {
    //     header("location: logout.php");
    // }
        $email=$_SESSION['email'];
   
        /*-------------------databse connet method-VB------------------*/

        $mysqli= new mysqli('localhost','root','','vacchistory') or die(mysqli_error($mysqli));

        /*-------------------databse connet method-VB------------------*/

        $vacc=$mysqli->query("select * from vaccinedetails")or die(mysqli_error($mysqli));

        if(isset($_POST['search']))
        {
            $st= $_POST['state'];
            $dt= $_POST['district'];
            if($st!='null')
             $result=$mysqli->query("select * from docschedule where state='$st' and district='$dt'") or  die($mysqli->error);
            
        }
        if(!isset($_POST['search']))
        {
            $result=$mysqli->query("select * from docschedule") or  die($mysqli->error);  
        } 
        if(isset($_POST['book']))
        {   
                     
            $sid=$_POST['book'];  
            $date=$_POST['vaccname'];
            echo $date; 
            $insert=$mysqli->query("INSERT INTO appointments (cemail,sid,demail,cname) VALUES('$email','$sid',(Select demail from docschedule where sid='$sid'),(select name from citizendetails where email='$email'))");
         
            if($insert){
               echo "Success machane";
           }
         
        }
    
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Citizen's Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />	
    <link href="assets/css/style.css" rel="stylesheet" />
	
	
	
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="#000" data-image="assets/images/sidebar.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<?php require "includes/side_wrapper.php"; ?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: #000;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">APPOINTMENT</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" style="color: #fff;">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>




        <div class="container">
            <div >
                <div>
                    <div class="well-block">
                        <div class="well-title">
                            <h2>Book an Appointment</h2>
                        </div>
                        <!-- Form start -->
                        <form action="" method="POST">
                        <!-----------search-bar--------------------->
                            <div class="form-group col-md-3">
                                <label for="inputVaccine">Vaccine</label>
                                <select name="vaccine" class="form-control" id="inputVaccine">
                                    <option value="">Select</option>
                                    <?php while($r= $vacc->fetch_assoc()): ?>
                                        <option value="<?php echo $r['vaccname'] ?>"><?php echo $r['vaccname'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select name="state" class="form-control" id="inputState">
                                                    <option value="SelectState">Select State</option>
                                                    <option value="Andra Pradesh">Andra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madya Pradesh">Madya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttaranchal">Uttaranchal</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                    <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Lakshadeep">Lakshadeep</option>
                                                    <option value="Pondicherry">Pondicherry</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputDistrict">District</label>
                                <select name="district" class="form-control" id="inputDistrict">
                                    <option value="">-- select one -- </option>
                                </select>
                            </div>
                            <div name="form-group col-md-4">
                                <button name="search" class="btn btn-primary" style="margin-top:35px;">Find</button>
                            </div>                           
                            </for>
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
                        <!------------------------------------------->
<!-- states -->
                    <script type="text/javascript">
                                var AndraPradesh = ["Anantapur","Chittoor","East Godavari","Guntur","Kadapa","Krishna","Kurnool","Prakasam","Nellore","Srikakulam","Visakhapatnam","Vizianagaram","West Godavari"];
                                var ArunachalPradesh = ["Anjaw","Changlang","Dibang Valley","East Kameng","East Siang","Kra Daadi","Kurung Kumey","Lohit","Longding","Lower Dibang Valley","Lower Subansiri","Namsai","Papum Pare","Siang","Tawang","Tirap","Upper Siang","Upper Subansiri","West Kameng","West Siang","Itanagar"];
                                var Assam = ["Baksa","Barpeta","Biswanath","Bongaigaon","Cachar","Charaideo","Chirang","Darrang","Dhemaji","Dhubri","Dibrugarh","Goalpara","Golaghat","Hailakandi","Hojai","Jorhat","Kamrup Metropolitan","Kamrup (Rural)","Karbi Anglong","Karimganj","Kokrajhar","Lakhimpur","Majuli","Morigaon","Nagaon","Nalbari","Dima Hasao","Sivasagar","Sonitpur","South Salmara Mankachar","Tinsukia","Udalguri","West Karbi Anglong"];
                                var Bihar = ["Araria","Arwal","Aurangabad","Banka","Begusarai","Bhagalpur","Bhojpur","Buxar","Darbhanga","East Champaran","Gaya","Gopalganj","Jamui","Jehanabad","Kaimur","Katihar","Khagaria","Kishanganj","Lakhisarai","Madhepura","Madhubani","Munger","Muzaffarpur","Nalanda","Nawada","Patna","Purnia","Rohtas","Saharsa","Samastipur","Saran","Sheikhpura","Sheohar","Sitamarhi","Siwan","Supaul","Vaishali","West Champaran"];
                                var Chhattisgarh = ["Balod","Baloda Bazar","Balrampur","Bastar","Bemetara","Bijapur","Bilaspur","Dantewada","Dhamtari","Durg","Gariaband","Janjgir Champa","Jashpur","Kabirdham","Kanker","Kondagaon","Korba","Koriya","Mahasamund","Mungeli","Narayanpur","Raigarh","Raipur","Rajnandgaon","Sukma","Surajpur","Surguja"];
                                var Goa = ["North Goa","South Goa"];
                                var Gujarat = ["Ahmedabad","Amreli","Anand","Aravalli","Banaskantha","Bharuch","Bhavnagar","Botad","Chhota Udaipur","Dahod","Dang","Devbhoomi Dwarka","Gandhinagar","Gir Somnath","Jamnagar","Junagadh","Kheda","Kutch","Mahisagar","Mehsana","Morbi","Narmada","Navsari","Panchmahal","Patan","Porbandar","Rajkot","Sabarkantha","Surat","Surendranagar","Tapi","Vadodara","Valsad"];
                                var Haryana = ["Ambala","Bhiwani","Charkhi Dadri","Faridabad","Fatehabad","Gurugram","Hisar","Jhajjar","Jind","Kaithal","Karnal","Kurukshetra","Mahendragarh","Mewat","Palwal","Panchkula","Panipat","Rewari","Rohtak","Sirsa","Sonipat","Yamunanagar"];
                                var HimachalPradesh = ["Bilaspur","Chamba","Hamirpur","Kangra","Kinnaur","Kullu","Lahaul Spiti","Mandi","Shimla","Sirmaur","Solan","Una"];
                                var JammuKashmir = ["Anantnag","Bandipora","Baramulla","Budgam","Doda","Ganderbal","Jammu","Kargil","Kathua","Kishtwar","Kulgam","Kupwara","Leh","Poonch","Pulwama","Rajouri","Ramban","Reasi","Samba","Shopian","Srinagar","Udhampur"];
                                var Jharkhand = ["Bokaro","Chatra","Deoghar","Dhanbad","Dumka","East Singhbhum","Garhwa","Giridih","Godda","Gumla","Hazaribagh","Jamtara","Khunti","Koderma","Latehar","Lohardaga","Pakur","Palamu","Ramgarh","Ranchi","Sahebganj","Seraikela Kharsawan","Simdega","West Singhbhum"];
                                var Karnataka = ["Bagalkot","Bangalore Rural","Bangalore Urban","Belgaum","Bellary","Bidar","Vijayapura","Chamarajanagar","Chikkaballapur","Chikkamagaluru","Chitradurga","Dakshina Kannada","Davanagere","Dharwad","Gadag","Gulbarga","Hassan","Haveri","Kodagu","Kolar","Koppal","Mandya","Mysore","Raichur","Ramanagara","Shimoga","Tumkur","Udupi","Uttara Kannada","Yadgir"];
                                var Kerala = ["Alappuzha","Ernakulam","Idukki","Kannur","Kasaragod","Kollam","Kottayam","Kozhikode","Malappuram","Palakkad","Pathanamthitta","Thiruvananthapuram","Thrissur","Wayanad"];
                                var MadhyaPradesh = ["Agar Malwa","Alirajpur","Anuppur","Ashoknagar","Balaghat","Barwani","Betul","Bhind","Bhopal","Burhanpur","Chhatarpur","Chhindwara","Damoh","Datia","Dewas","Dhar","Dindori","Guna","Gwalior","Harda","Hoshangabad","Indore","Jabalpur","Jhabua","Katni","Khandwa","Khargone","Mandla","Mandsaur","Morena","Narsinghpur","Neemuch","Panna","Raisen","Rajgarh","Ratlam","Rewa","Sagar","Satna",
                                "Sehore","Seoni","Shahdol","Shajapur","Sheopur","Shivpuri","Sidhi","Singrauli","Tikamgarh","Ujjain","Umaria","Vidisha"];
                                var Maharashtra = ["Ahmednagar","Akola","Amravati","Aurangabad","Beed","Bhandara","Buldhana","Chandrapur","Dhule","Gadchiroli","Gondia","Hingoli","Jalgaon","Jalna","Kolhapur","Latur","Mumbai City","Mumbai Suburban","Nagpur","Nanded","Nandurbar","Nashik","Osmanabad","Palghar","Parbhani","Pune","Raigad","Ratnagiri","Sangli","Satara","Sindhudurg","Solapur","Thane","Wardha","Washim","Yavatmal"];
                                var Manipur = ["Bishnupur","Chandel","Churachandpur","Imphal East","Imphal West","Jiribam","Kakching","Kamjong","Kangpokpi","Noney","Pherzawl","Senapati","Tamenglong","Tengnoupal","Thoubal","Ukhrul"];
                                var Meghalaya = ["East Garo Hills","East Jaintia Hills","East Khasi Hills","North Garo Hills","Ri Bhoi","South Garo Hills","South West Garo Hills","South West Khasi Hills","West Garo Hills","West Jaintia Hills","West Khasi Hills"];
                                var Mizoram = ["Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip","Aizawl","Champhai","Kolasib","Lawngtlai","Lunglei","Mamit","Saiha","Serchhip"];
                                var Nagaland = ["Dimapur","Kiphire","Kohima","Longleng","Mokokchung","Mon","Peren","Phek","Tuensang","Wokha","Zunheboto"];
                                var Odisha = ["Angul","Balangir","Balasore","Bargarh","Bhadrak","Boudh","Cuttack","Debagarh","Dhenkanal","Gajapati","Ganjam","Jagatsinghpur","Jajpur","Jharsuguda","Kalahandi","Kandhamal","Kendrapara","Kendujhar","Khordha","Koraput","Malkangiri","Mayurbhanj","Nabarangpur","Nayagarh","Nuapada","Puri","Rayagada","Sambalpur","Subarnapur","Sundergarh"];
                                var Punjab = ["Amritsar","Barnala","Bathinda","Faridkot","Fatehgarh Sahib","Fazilka","Firozpur","Gurdaspur","Hoshiarpur","Jalandhar","Kapurthala","Ludhiana","Mansa","Moga","Mohali","Muktsar","Pathankot","Patiala","Rupnagar","Sangrur","Shaheed Bhagat Singh Nagar","Tarn Taran"];
                                var Rajasthan = ["Ajmer","Alwar","Banswara","Baran","Barmer","Bharatpur","Bhilwara","Bikaner","Bundi","Chittorgarh","Churu","Dausa","Dholpur","Dungarpur","Ganganagar","Hanumangarh","Jaipur","Jaisalmer","Jalore","Jhalawar","Jhunjhunu","Jodhpur","Karauli","Kota","Nagaur","Pali","Pratapgarh","Rajsamand","Sawai Madhopur","Sikar","Sirohi","Tonk","Udaipur"];
                                var Sikkim = ["East Sikkim","North Sikkim","South Sikkim","West Sikkim"];
                                var TamilNadu = ["Ariyalur","Chennai","Coimbatore","Cuddalore","Dharmapuri","Dindigul","Erode","Kanchipuram","Kanyakumari","Karur","Krishnagiri","Madurai","Nagapattinam","Namakkal","Nilgiris","Perambalur","Pudukkottai","Ramanathapuram","Salem","Sivaganga","Thanjavur","Theni","Thoothukudi","Tiruchirappalli","Tirunelveli","Tiruppur","Tiruvallur","Tiruvannamalai","Tiruvarur","Vellore","Viluppuram","Virudhunagar"];
                                var Telangana = ["Adilabad","Bhadradri Kothagudem","Hyderabad","Jagtial","Jangaon","Jayashankar","Jogulamba","Kamareddy","Karimnagar","Khammam","Komaram Bheem","Mahabubabad","Mahbubnagar","Mancherial","Medak","Medchal","Nagarkurnool","Nalgonda","Nirmal","Nizamabad","Peddapalli","Rajanna Sircilla","Ranga Reddy","Sangareddy","Siddipet","Suryapet","Vikarabad","Wanaparthy","Warangal Rural","Warangal Urban","Yadadri Bhuvanagiri"];
                                var Tripura = ["Dhalai","Gomati","Khowai","North Tripura","Sepahijala","South Tripura","Unakoti","West Tripura"];
                                var UttarPradesh = ["Agra","Aligarh","Allahabad","Ambedkar Nagar","Amethi","Amroha","Auraiya","Azamgarh","Baghpat","Bahraich","Ballia","Balrampur","Banda","Barabanki","Bareilly","Basti","Bhadohi","Bijnor","Budaun","Bulandshahr","Chandauli","Chitrakoot","Deoria","Etah","Etawah","Faizabad","Farrukhabad","Fatehpur","Firozabad","Gautam Buddha Nagar","Ghaziabad","Ghazipur","Gonda","Gorakhpur","Hamirpur","Hapur","Hardoi","Hathras","Jalaun","Jaunpur","Jhansi","Kannauj","Kanpur Dehat","Kanpur Nagar","Kasganj","Kaushambi","Kheri","Kushinagar","Lalitpur","Lucknow","Maharajganj","Mahoba","Mainpuri","Mathura","Mau","Meerut","Mirzapur","Moradabad","Muzaffarnagar","Pilibhit","Pratapgarh","Raebareli","Rampur","Saharanpur","Sambhal","Sant Kabir Nagar","Shahjahanpur","Shamli","Shravasti","Siddharthnagar","Sitapur","Sonbhadra","Sultanpur","Unnao","Varanasi"];
                                var Uttarakhand  = ["Almora","Bageshwar","Chamoli","Champawat","Dehradun","Haridwar","Nainital","Pauri","Pithoragarh","Rudraprayag","Tehri","Udham Singh Nagar","Uttarkashi"];
                                var WestBengal = ["Alipurduar","Bankura","Birbhum","Cooch Behar","Dakshin Dinajpur","Darjeeling","Hooghly","Howrah","Jalpaiguri","Jhargram","Kalimpong","Kolkata","Malda","Murshidabad","Nadia","North 24 Parganas","Paschim Bardhaman","Paschim Medinipur","Purba Bardhaman","Purba Medinipur","Purulia","South 24 Parganas","Uttar Dinajpur"];
                                var AndamanNicobar = ["Nicobar","North Middle Andaman","South Andaman"];
                                var Chandigarh = ["Chandigarh"];
                                var DadraHaveli = ["Dadra Nagar Haveli"];
                                var DamanDiu = ["Daman","Diu"];
                                var Delhi = ["Central Delhi","East Delhi","New Delhi","North Delhi","North East Delhi","North West Delhi","Shahdara","South Delhi","South East Delhi","South West Delhi","West Delhi"];
                                var Lakshadweep = ["Lakshadweep"];
                                var Puducherry = ["Karaikal","Mahe","Puducherry","Yanam"];


                                $("#inputState").change(function(){
                                var StateSelected = $(this).val();
                                var optionsList;
                                var htmlString = "";

                                switch (StateSelected) {
                                    case "Andra Pradesh":
                                        optionsList = AndraPradesh;
                                        break;
                                    case "Arunachal Pradesh":
                                        optionsList = ArunachalPradesh;
                                        break;
                                    case "Assam":
                                        optionsList = Assam;
                                        break;
                                    case "Bihar":
                                        optionsList = Bihar;
                                        break;
                                    case "Chhattisgarh":
                                        optionsList = Chhattisgarh;
                                        break;
                                    case "Goa":
                                        optionsList = Goa;
                                        break;
                                    case  "Gujarat":
                                        optionsList = Gujarat;
                                        break;
                                    case "Haryana":
                                        optionsList = Haryana;
                                        break;
                                    case "Himachal Pradesh":
                                        optionsList = HimachalPradesh;
                                        break;
                                    case "Jammu and Kashmir":
                                        optionsList = JammuKashmir;
                                        break;
                                    case "Jharkhand":
                                        optionsList = Jharkhand;
                                        break;
                                    case  "Karnataka":
                                        optionsList = Karnataka;
                                        break;
                                    case "Kerala":
                                        optionsList = Kerala;
                                        break;
                                    case  "Madya Pradesh":
                                        optionsList = MadhyaPradesh;
                                        break;
                                    case "Maharashtra":
                                        optionsList = Maharashtra;
                                        break;
                                    case  "Manipur":
                                        optionsList = Manipur;
                                        break;
                                    case "Meghalaya":
                                        optionsList = Meghalaya ;
                                        break;
                                    case  "Mizoram":
                                        optionsList = Mizoram;
                                        break;
                                    case "Nagaland":
                                        optionsList = Nagaland;
                                        break;
                                    case  "Orissa":
                                        optionsList = Orissa;
                                        break;
                                    case "Punjab":
                                        optionsList = Punjab;
                                        break;
                                    case  "Rajasthan":
                                        optionsList = Rajasthan;
                                        break;
                                    case "Sikkim":
                                        optionsList = Sikkim;
                                        break;
                                    case  "Tamil Nadu":
                                        optionsList = TamilNadu;
                                        break;
                                    case  "Telangana":
                                        optionsList = Telangana;
                                        break;
                                    case "Tripura":
                                        optionsList = Tripura ;
                                        break;
                                    case  "Uttaranchal":
                                        optionsList = Uttaranchal;
                                        break;
                                    case  "Uttar Pradesh":
                                        optionsList = UttarPradesh;
                                        break;
                                    case "West Bengal":
                                        optionsList = WestBengal;
                                        break;
                                    case  "Andaman and Nicobar Islands":
                                        optionsList = AndamanNicobar;
                                        break;
                                    case "Chandigarh":
                                        optionsList = Chandigarh;
                                        break;
                                    case  "Dadar and Nagar Haveli":
                                        optionsList = DadraHaveli;
                                        break;
                                    case "Daman and Diu":
                                        optionsList = DamanDiu;
                                        break;
                                    case  "Delhi":
                                        optionsList = Delhi;
                                        break;
                                    case "Lakshadeep":
                                        optionsList = Lakshadeep ;
                                        break;
                                    case  "Pondicherry":
                                        optionsList = Pondicherry;
                                        break;
                                }


                                for(var i = 0; i < optionsList.length; i++){
                                    htmlString = htmlString+"<option value='"+ optionsList[i] +"'>"+ optionsList[i] +"</option>";
                                }
                                $("#inputDistrict").html(htmlString);

                                });
                    </script>
<!-- end -->

                        <!-------------display--result------------->
                            <div>
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th scope="col">Doctor</th>
                                        <th scopr="col">Hospital</th>
                                        <th scope="col">State</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th colspan="3">Action</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                <!----begin loop to display result-->
                                <?php
                                        while ($row= $result->fetch_assoc()): ?>
                                        
                                        <tr>
                                        <td><?php echo $row['dname'] ?></td>
                                    <!-- To Display hospital name from the hospital id that we've extracted -->
                                      <td><?php 
                                        $hospitalid=$row['hospital'];
                                        $zxc=$mysqli->query("SELECT name from hospitaldetails where id='$hospitalid'") or die($mysqli->error);
                                        while($hos=$zxc->fetch_assoc()){
                                            echo $hos['name'];
                                        }
                                        ?></td>
                                    <!-- To Display hospital name from the hospital id that we've extracted -->
                                        <td><?php echo $row['state'] ?></td>
                                        <td><?php echo $row['district'] ?></td>
                                        <td><?php echo $row['date'] ?></td>
                                      
                                           
                                        <td><?php echo $row['fromtime'] ?></td>
                                        <td><?php echo $row['totime'] ?></td>
                                        <td>
                                            <form method="POST">
                                                <input name="vaccinename" hidden id="vaccinename">
                                          <input name="date" hidden  value="<?php echo $row['date'] ?>">
                                          <button name="book" type="SUBMIT" onclick="messageandemail();" class="btn btn-warning" value="<?php   echo $row['sid'] ?>">BOOK</button>
                                         </form>
                                        </td>
                                        </tr>
                                        <?php endwhile; ?>
                                <!--------------------loop ends-------------->
                                </tbody>
                                </table>
                            </div>
                        <!----------------------------------------->
                        </form>
                        <!-- form end -->
                    </div>
                </div>

            </div>
        </div>


      

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; 2021 <a href="dashboard.php" style="color: #000;">Citizen</a>
                </p>
            </div>
            </footer>

         </div>
     </div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	
    <script>
        function messageandemail(){
            
            return confirm('Are you sure?')
        }
    </script>
	<script type="text/javascript">
    
			
			$("#inputVaccine").change(function(){
              var vaccine=$("#inputVaccine").val();
            var vaccinepost=$("#vaccinename");
            vaccinepost.
            });

    	
	</script>
</html>
