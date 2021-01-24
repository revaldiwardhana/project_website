<script>
  jq(document).ready(function(){
    jq("#tanggal_keberangkatan").trigger("change");//change menu dropdown trigger digunakan
  });

  jq("#tanggal_keberangkatan").change(function(){
    var tgl_berangkat = jq(this).val();
    jq.ajax({
			url   : '<?php echo base_url(); ?>pemesanan/cek_keberangkatan',
			type  : "GET",
      data  : {tgl:tgl_berangkat},
			success : function(response) {
				var data = JSON.parse(response);
        populate_bus(data);
			},
			error:function(x,e) {
			}
		});
  });

  jq("#id_bus").change(function(){
    var max_bus     = jq("#id_bus option:selected").data("max");
    var placeholder = jq("#id_bus option:selected").data("placehold");
    console.log("idbus change"+max_bus);
    jq("#jumlah_bus").prop("placeholder",placeholder);
    jq("#jumlah_bus").prop("max",max_bus);
    jq("#jumlah_bus").prop("min",1);
  });

  function populate_bus(data){
    jq("#id_bus").empty();
    var opt = "";
    jq.each(data, function(x,y){
      var bus_tersedia = y.jumlah_bus-y.jumlah_bus_dipesan;

      if(bus_tersedia <= 0){
        var placeholder = "Bus sudah penuh";
        var dis         = "disabled";
        var capt        = " (Penuh)";
      }else{
        
        var placeholder = "maksimal jumlah bus yang bisa dipesan : "+bus_tersedia;
        var dis         = "";
        var capt        = "";
      }

      opt += "<option "+dis+" value='"+y.id_bus+"' data-max='"+bus_tersedia+"' data-placehold='"+placeholder+"'> "+y.jenis_bus+"-" +y.jumlah_tempatduduk+"-" +y.fasilitas_bus+capt+"</option>";
    });
    jq("#id_bus").append(opt);
    jq("#id_bus").trigger("change");
  }
</script>