    <link href="css/vendor.min.css" rel="stylesheet">
    <link href="css/theme-core.min.css" rel="stylesheet">
    <link href="css/module-essentials.min.css" rel="stylesheet" />
    <link href="css/module-material.min.css" rel="stylesheet" />
    <link href="css/module-layout.min.css" rel="stylesheet" />
    <link href="css/module-sidebar.min.css" rel="stylesheet" />
    <link href="css/module-sidebar-skins.min.css" rel="stylesheet" />
    <link href="css/module-navbar.min.css" rel="stylesheet" />
    <link href="css/module-messages.min.css" rel="stylesheet" />
    <link href="css/module-carousel-slick.min.css" rel="stylesheet" />
    <link href="css/module-charts.min.css" rel="stylesheet" />
    <link href="css/module-maps.min.css" rel="stylesheet" />
    <link href="css/module-colors-alerts.min.css" rel="stylesheet" />
    <link href="css/module-colors-background.min.css" rel="stylesheet" />
    <link href="css/module-colors-buttons.min.css" rel="stylesheet" />
    <link href="css/module-colors-text.min.css" rel="stylesheet" />
    <script src="css/jquery/jquery.js"></script>
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/jquery/jquery.form.js"></script>
    <script src="css/jquery/jquery-1.9.1.js"></script>

    <!-- js -->
    <script>
        // carousel home
    $(function(){
    $('.carousel').carousel({
        interval: 3000
    });
    });

    // data-jadwal
    $(document).ready(function() {
    $('#contact-detail').dataTable({
		"responsive": true,
		"columnDefs": [
		{ responsivePriority: 1, targets: 0 },
		{ responsivePriority: 2, targets: 4 }
		]
        } );
    } );
    </script>
    <!--  -->

    <!-- css -->
    <style>
        /* body */
        .bottom-footer body {
            padding-bottom: 0px !important;
            background: rgb(17,130,80); 
            background: linear-gradient(90deg, rgba(17,130,80,1) 0%, rgba(60,144,147,1) 51%, rgba(17,130,80,1) 72%);
        }
        /* cara-booking */
        #cara-booking-container{
            margin:2rem auto 5rem auto;
        }
        #cara-booking img{
            max-height: 20rem;
            margin-bottom: 1rem;
            box-shadow: 3px 3px 8px #000000;
        }
        /* data-jadwal */
        #th-data-jadwal{
            border-bottom:solid;
            border-color:black;
            border-width:1.5px; 
            text-align:center
        }
        #td-custom{
            font-size:auto;
            border-bottom:solid;
            border-color:black;
            border-width:1.5px; 
            text-align:center
        }
        /* info lapangan */
        #info-lapangan{
            margin: 0.5rem;  
            padding: 0.5rem;
        }
        #info-lapangan img{
            width: auto;
            max-height: 18rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            box-shadow: 3px 3px 8px #000000;
        }
        #info-lapangan p{
            font-size: 16px;
            text-align: justify;
        }
        /* navbar */
        #navbar{
            background: rgb(86,117,117);
            background: linear-gradient(90deg, rgba(86,117,117,1) 0%, rgba(17,47,47,1) 31%, rgba(0,0,0,1) 73%);
        }
        #navbar a{
            color:white !important;
        }
        #navbar a:hover{
            color:black !important;
        }
        #navbar-transaksi{
            color: white !important;
        }
        #navbar-transaksi:hover{
            color: black !important;
        }
        /* home */
        #carousel-nav{
            background: rgb(17,9,9);
            background: linear-gradient(90deg, rgba(17,9,9,1) 0%, rgba(255,255,255,0.5536589635854341) 0%, rgba(141,140,140,1) 0%, rgba(39,38,38,1) 0%, rgba(0,0,0,0.7637429971988796) 0%);
            margin:auto;font-size:60px;
            border-radius:180px;
            width:4rem;height:4rem;
            padding:10px;
            /* position: fixed; */
        }
        #home-deskripsi{
            margin:1rem;
            text-align: justify;
        }
        #profil-lapangan{
            margin: 2rem 0rem 2rem 0rem;
        }
        #profil-gambar{
            width:25rem;max-height:16rem;margin:0.5rem;
            box-shadow: 3px 3px 8px #000000;
        }
        /* footer */
        #footer{
            color:white !important;
            padding:1rem 0rem 1rem 2rem;
            background: rgb(86,117,117);
            background: linear-gradient(90deg, rgba(86,117,117,1) 0%, rgba(17,47,47,1) 31%, rgba(0,0,0,1) 73%);
        }

        /* color-text */
        #c-white{
            color: white;
        }
        /* transaksi */
        #transaksi {
            color:black !important;
        }
        #transaksi :hover{
            color:white !important;
        }
    </style>
    <!--  -->