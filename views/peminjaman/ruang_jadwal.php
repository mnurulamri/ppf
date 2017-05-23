<!doctype html>
<!--<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Jadwal Ujian Tengah Semester</title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="title" content="Samples" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />	
	
	<link rel="icon" href="../common/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../common/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="dhtmlx/dhtmlxGrid/samples/common/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="dhtmlx/dhtmlxGrid/codebase/skins/dhtmlxgrid_dhx_skyblue.css">
	<link rel="stylesheet" href="../css/menu_ujian.css" type="text/css" media="screen" />

</head>-->


	<!--<script src="../dhtml/codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>-->
	<script src="<?=base_url()?>/assets/dhtmlx/dhtmlxScheduler/codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>/assets/dhtmlx/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_units.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="<?=base_url()?>/assets/dhtmlx/dhtmlxScheduler/codebase/dhtmlxscheduler.css" type="text/css" title="no title" charset="utf-8">
	<script src="<?=base_url()?>/assets/dhtmlx/dhtmlxScheduler/codebase/ext/dhtmlxscheduler_minical.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>/assets/dhtmlx/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor.js"></script>	<!-- untuk crud otomatis -->	
	<script src="<?=base_url()?>/assets/dhtmlx/dhtmlxDataProcessor/codebase/dhtmlxdataprocessor_debug.js"></script>
	<script src="<?=base_url()?>/assets/dhtmlx/dhtmlxDataProcessor/codebase/dhtmlxscheduler_recurring.js"></script>
	
<style type="text/css" media="screen">
	html, body{
		margin:0px;
		padding:0px;
		height:100%;
		overflow:hidden;
	}	
	
	/*event in day or week view*/
	.dhx_cal_event.event_paralel div{
		background-color: #009966 !important;
		color: white !important;
	}
	
	.dhx_cal_event.event_KKI div{
		background-color: #ff9933 !important;
		color: white !important;
	}
	
	.dhx_cal_event.event_ekstensi div{
		background-color: #c85ec7 !important;
		color: white !important;
	}
	
	.dhx_cal_event.event_pasca div{
		background-color: #808000 !important;
		color: white !important;
	}	
	
	.dhx_cal_header {
		height:100px;
	}
</style>

<script type="text/javascript" charset="utf-8">
	function init() {

		var sections=[
			{key:"AJS" ,label:"AJS<br>150"},
			{key:"E.103A" ,label:"E.103A<br>35"},
			{key:"E.103B" ,label:"E.103B<br>35"},
			{key:"E.201" ,label:"E.201<br>35"},
			{key:"E.202" ,label:"E.202<br>10"},
			{key:"E.203A" ,label:"E.203A<br>35"},
			{key:"E.203B" ,label:"E.203B<br>35"},
			{key:"E.204" ,label:"E.204<br>20"},
			{key:"E.301" ,label:"E.301<br>40"},
			{key:"E.302" ,label:"E.302<br>40"},
			{key:"E.303" ,label:"E.303<br>40"},
			{key:"E.304" ,label:"E.304<br>40"},
			{key:"F.201" ,label:"F.201<br>10"},
			{key:"F.202" ,label:"F.202<br>60"},
			{key:"G.106" ,label:"G.106"},
			{key:"G.201" ,label:"G.201<br>35"},
			{key:"G.202" ,label:"G.202<br>35"},
			{key:"G.203" ,label:"G.203<br>35"},
			{key:"G.203A" ,label:"G.203A"},
			{key:"G.203B" ,label:"G.203B"},
			{key:"G.204" ,label:"G.204<br>35"},
			{key:"G.205" ,label:"G.205<br>35"},
			{key:"G.205A" ,label:"G.205A"},
			{key:"G.205B" ,label:"G.205B"},
			{key:"G.301" ,label:"G.301"},
			{key:"G.302" ,label:"G.302"},
			{key:"G.303" ,label:"G.303"},
			{key:"G.304" ,label:"G.304"},
			{key:"G.401" ,label:"G.401<br>40"},
			{key:"G.402" ,label:"G.402<br>40"},
			{key:"G.403" ,label:"G.403<br>40"},
			{key:"G.404" ,label:"G.404<br>40"},
			{key:"G.405" ,label:"G.405<br>40"},
			{key:"H.101" ,label:"H.101<br>35"},
			{key:"H.102" ,label:"H.102<br>40"},
			{key:"H.103" ,label:"H.103<br>40"},
			{key:"H.201" ,label:"H.201<br>30"},
			{key:"H.202" ,label:"H.202<br>30"},
			{key:"H.203" ,label:"H.203<br>30"},
			{key:"H.204" ,label:"H.204<br>40"},
			{key:"H.205" ,label:"H.205<br>40"},
			{key:"H.301" ,label:"H.301<br>30"},
			{key:"H.302" ,label:"H.302<br>30"},
			{key:"H.303" ,label:"H.303<br>30"},
			{key:"H.304" ,label:"H.304<br>40"},
			{key:"H.305" ,label:"H.305<br>40"},
			{key:"H.401" ,label:"H.401<br>30"},
			{key:"H.402" ,label:"H.402<br>30"},
			{key:"H.403" ,label:"H.403<br>30"},
			{key:"H.404" ,label:"H.404<br>40"},
			{key:"H.405" ,label:"H.405<br>40"},
			{key:"H.501" ,label:"H.501<br>40"},
			{key:"H.502" ,label:"H.502<br>40"},
			{key:"H.503" ,label:"H.503<br>40"},
			{key:"H.504" ,label:"H.504<br>40"},
			{key:"M.101" ,label:"M.101<br>40"},
			{key:"M.102" ,label:"M.102<br>40"},
			{key:"M.103" ,label:"M.103<br>40"},
			{key:"M.104" ,label:"M.104<br>35"},
			{key:"M.301" ,label:"M.301<br>35"},
			{key:"M.302" ,label:"M.302<br>30"},
			{key:"M.303" ,label:"M.303<br>40"},
			{key:"M.304" ,label:"M.304<br>40"},
			{key:"N1.301A" ,label:"N1.301A<br>25"},
			{key:"N1.301B" ,label:"N1.301B<br>35"},
			{key:"N1.301C" ,label:"N1.301C<br>35"},
			{key:"N1.302" ,label:"N1.302<br>-"},
			{key:"N1.303" ,label:"N1.303<br>10"},
			{key:"N1.304" ,label:"N1.304<br>35"},
			{key:"N1.305" ,label:"N1.305<br>20"},
			{key:"N1.306" ,label:"N1.306<br>20"},
			{key:"N2.101" ,label:"N2.101<br>-"},
			{key:"N2.102" ,label:"N2.102<br>40"},
			{key:"N2.301" ,label:"N2.301<br>10"},
			{key:"N2.302" ,label:"N2.302<br>35"},
			{key:"N2.303" ,label:"N2.303<br>35"},
			{key:"N2.304" ,label:"N2.304<br>35"},
			{key:"N2.305" ,label:"N2.305<br>35"},
			{key:"N2.306" ,label:"N2.306<br>30"},
			{key:"Gd. Kom Lt 1" ,label:"Gd. Kom Lt 1"},
			{key:"Gd. Kom Lt 3" ,label:"Gd. Kom Lt 3"},
			{key:"Gd. Kom. 303" ,label:"Gd. Kom. 303"},
			{key:"Kom-Cocacola" ,label:"Kom-Cocacola<br>30"},
			{key:"Kom-Fanta" ,label:"Kom-Fanta<br>35"},
			{key:"Kom-Fresty" ,label:"Kom-Fresty<br>30"},
			{key:"Kom-Sprite" ,label:"Kom-Sprite<br>20"},
			{key:"Lab. AV" ,label:"Lab. AV"},
			{key:"B.301" ,label:"B.301"},
			{key:"Lab. MM" ,label:"Lab. MM"},
			{key:"Audito.Kom.", label:"Audito.Kom."},
			{key:"X" ,label:"X"}
		];
		
		//color event
		scheduler.templates.event_class = function(start_date, end_date, event) {
			if(event.kelas == "Paralel") // if event has subject property then special class should be assigned
                return "event_paralel";
			if(event.kelas == "KKI" || event.kelas == "Kls Inte") // if event has subject property then special class should be assigned
                return "event_KKI";
			if(event.kelas == "Ekstensi") // if event has subject property then special class should be assigned
                return "event_ekstensi";
			if(event.kelas == "S2" || event.kelas == "S3") // if event has subject property then special class should be assigned
                return "event_pasca";
			return ""; // default return
		};		
		
		scheduler.xy.scale_height = 35;
		
		scheduler.locale.labels.unit_tab = "Ruang"
		scheduler.locale.labels.section_custom="Section";
		scheduler.config.details_on_create=true;
		scheduler.config.details_on_dblclick=true;
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.first_hour = 8;
		scheduler.config.lightbox.sections=[	
			{name:"description", height:70, map_to:"text", type:"textarea" , focus:true},
			{name:"pengajar", height:70, map_to:"pengajar", type:"textarea" , focus:false, label:"pengajar"},
			{name:"kelas", height:70, map_to:"kelas", type:"textarea" , focus:false, label:"kelas"},
			{name:"custom", height:23, type:"select", options:sections, map_to:"section_id" },
			{name:"time", height:72, type:"time", map_to:"auto"}
		]
		
		scheduler.createUnitsView({
			name:"unit",
			property:"section_id",
			list:sections,
			size:15,
			step:15
		});
		scheduler.config.multi_day = true;
		
		scheduler.init('scheduler_here',new Date(2017,01,20),"unit");
		//scheduler.load("jadwal_units.xml");
		scheduler.load("./ruang_jadwal/data");
		
		var dp = new dataProcessor("crud/update.php");
	}

	function show_minical(){
		if (scheduler.isCalendarVisible())
			scheduler.destroyCalendar();
		else
			scheduler.renderCalendar({
				position:"dhx_minical_icon",
				date:scheduler._date,
				navigation:true,
				handler:function(date,calendar){
					scheduler.setCurrentView(date);
					scheduler.destroyCalendar()
				}
			});
	}

</script>
<script src="../lib/js/datetimepicker.js"></script>
<script type="text/javascript" charset="utf-8">
function date_opt(){
		var tgl = document.getElementById('date_opt').value;
		tgl_arr = tgl.split('-');	
		var t = tgl_arr[2];
		var b = tgl_arr[0];
		var h = tgl_arr[1];
		var tanggal = new Date(t, b, h); 
		
		var tahun = tanggal.getFullYear();
		var bulan = tanggal.getMonth()-1;
		var hari = tanggal.getDate();
		
		//color event
		scheduler.templates.event_class = function(start_date, end_date, event) {
			if(event.kelas == "Paralel") // if event has subject property then special class should be assigned
                return "event_paralel";
			if(event.kelas == "KKI" || event.kelas == "Kls Inte") // if event has subject property then special class should be assigned
                return "event_KKI";
			if(event.kelas == "Ekstensi") // if event has subject property then special class should be assigned
                return "event_ekstensi";
			if(event.kelas == "S2" || event.kelas == "S3") // if event has subject property then special class should be assigned
                return "event_pasca";
			return ""; // default return
		};		
		
		scheduler.xy.scale_height = 35;
		
		scheduler.locale.labels.unit_tab = "Ruang"
		scheduler.locale.labels.section_custom="Section";
		scheduler.config.details_on_create=true;
		scheduler.config.details_on_dblclick=true;
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.first_hour = 8;
		scheduler.config.lightbox.sections=[	
			{name:"description", height:70, map_to:"text", type:"textarea" , focus:true},
			{name:"pengajar", height:70, map_to:"pengajar", type:"textarea" , focus:false, label:"pengajar"},
			{name:"kelas", height:70, map_to:"kelas", type:"textarea" , focus:false, label:"kelas"},
			{name:"custom", height:23, type:"select", options:sections, map_to:"section_id" },
			{name:"time", height:72, type:"time", map_to:"auto"}
		]
		
		scheduler.createUnitsView({
			name:"unit",
			property:"section_id",
			list:sections,
			size:15,
			step:15
		});
		scheduler.config.multi_day = true;
		
		scheduler.init('scheduler_here',new Date(tahun,bulan,hari),"unit");
		//scheduler.load("jadwal_units.xml");
		//scheduler.load("papan_get_ppf.php");
}
</script>
<body onload="init();">
<?=$head?>
<?=$header?>
<?=$sidebar?>
<?//=$content?>
	<?//include("menu_tes.html")?>

	<div id="scheduler_here" class="dhx_cal_container" style='width:84%; height:100%; margin-left:235px'>
		
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_minical_icon" id="dhx_minical_icon" onclick="show_minical()">&nbsp;</div>
			<!--
			<div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
			<div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
			<div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
			-->
		</div>
		<div class="dhx_cal_header">
		</div>
		<div class="dhx_cal_data">
		</div>		
	</div>
</body>
