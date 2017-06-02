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
	.dhx_cal_event.event_1 div{
		background-color: #ED4337 !important;
		color: white !important;
	}
	
	.dhx_cal_event.event_2 div{
		background-color: #808000 !important;
		color: white !important;
	}
	
	.dhx_cal_event.event_3 div{
		background-color: #009966 !important;
		color: white !important;
	}
	
	.dhx_cal_event.event_kp div{
		background-color: #C85EC7 !important;
		color: white !important;
	}	
	
	.dhx_cal_header {
		height:100px;
	}
</style>

<script type="text/javascript" charset="utf-8">
	function init() {

		var sections=[
			{key:"AJS" ,label:"RUANG AJS"},
			{key:"2" ,label:"RUANG 2"},
			{key:"3" ,label:"RUANG 3"},
			{key:"4" ,label:"RUANG 4"},
			{key:"5" ,label:"RUANG 5"},
			{key:"6" ,label:"RUANG 6"},
			{key:"7" ,label:"RUANG 7"},
			{key:"8" ,label:"RUANG 8"},
			{key:"9" ,label:"RUANG 9"},
			{key:"10" ,label:"RUANG 10"},
			{key:"11" ,label:"RUANG 11"},
			{key:"12" ,label:"RUANG 12"},
			{key:"13" ,label:"RUANG 13"},
			{key:"14" ,label:"RUANG 14"},
			{key:"15" ,label:"RUANG 15"},
			{key:"16" ,label:"RUANG 16"},
			{key:"17" ,label:"RUANG 17"},
			{key:"18" ,label:"RUANG 18"},
			{key:"X" ,label:"X"}
		];
		
		//color event
		scheduler.templates.event_class = function(start_date, end_date, event) {
			if(event.flag == "1" && event.level == "0") // if event has subject property then special class should be assigned
                return "event_kp";
			if(event.flag == "1" && event.level == "1") // if event has subject property then special class should be assigned
                return "event_1";
			if(event.flag == "1" && event.level == "2") // if event has subject property then special class should be assigned
                return "event_2";
			if(event.flag == "1" && event.level == "3") // if event has subject property then special class should be assigned
                return "event_3";
			return ""; // default return
		};		
		
		scheduler.xy.scale_height = 35;
		
		scheduler.locale.labels.unit_tab = "Ruang"
		scheduler.locale.labels.section_custom="Section";
		scheduler.locale.labels.section_unit_kerja="Unit Kerja";
		scheduler.locale.labels.section_custom="Nama Peminjam";
		scheduler.config.details_on_create=true;
		scheduler.config.details_on_dblclick=true;
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.first_hour = 8;
		scheduler.config.lightbox.sections=[	
			{name:"description", height:70, map_to:"text", type:"textarea" , focus:true},
			{name:"unit_kerja", height:30, map_to:"unit_kerja", type:"textarea" , focus:false, label:"Unit Kerja"},
			{name:"nama_peminjam", height:70, map_to:"nama_peminjam", type:"textarea" , focus:false, label:"nama_peminjam"},
			{name:"custom", height:23, type:"select", options:sections, map_to:"details" },
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
		scheduler.load("./scheduler_rapat/data_biasa");
		
		var dp = new dataProcessor("./scheduler_rapat/data_biasa");
		dp.init(scheduler);
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
			if(event.flag == "1" && event.level == "0") // if event has subject property then special class should be assigned
                return "event_kp";
			if(event.flag == "1" && event.level == "1") // if event has subject property then special class should be assigned
                return "event_1";
			if(event.flag == "1" && event.level == "2") // if event has subject property then special class should be assigned
                return "event_2";
			if(event.flag == "1" && event.level == "3") // if event has subject property then special class should be assigned
                return "event_3";
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
			{name:"unit_kerja", height:30, map_to:"unit_kerja", type:"textarea" , focus:false, label:"Unit Kerja"},
			{name:"nama_peminjam", height:70, map_to:"nama_peminjam", type:"textarea" , focus:false, label:"nama_peminjam"},
			{name:"details", height:23, type:"select", options:sections, map_to:"details" },
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
<?//=$head?>
<?//=$header?>
<?//=$sidebar?>
<?//=$content?>
	<?//include("menu_tes.html")?>

	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
		
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