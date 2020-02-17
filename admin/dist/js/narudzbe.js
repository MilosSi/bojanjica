$(document).ready(function () {
  $("#status").change(function () {
      let vrednost=$(this).val();
      let idnarudzbenice=$("#idnar").val();
      $.ajax({
        type:"POST",
        url:"index.php?adminpage=ajaxstatus",
        data:{
          vrednost,
          idnarudzbenice
        },
        success:function(podaci,jq,kod)
        {

          if(kod.status==200)
          {
            alert("Status promenjen");
          }
          else
          {
            alert("Greska");
          }


        },
        error:function(err)
        {
          console.log(`${err.status}`);
        }
      })
  })
})
