$(".cenablok").hide('fast');
$(document).ready(function () {
  $("#tip_p_id").change(function () {
    let id=$(this).val();
    if(id==1)
    {
      $(".cenablok").slideDown();
    }
    else
    {
      let ispis=`<div class="col-md-12">
                <div class="form-group">
                  <label for="inputEstimatedBudget">Unesite broj cena (Primer SOk od jabuke moze imate i cenu za 1.5L i za 0.7 L)</label>
                  <input type="text" id="brojcena" name="brojcena" class="form-control">
                </div>
              </div>`;
      $(".cenaostali").html(ispis);
      $(".cenablok").slideDown();

      $("#brojcena").blur(function () {
        let brojcena=$(this).val();
        napraviCeneUnos(brojcena);
      })
    }
  })

  $("#sub").click(function () {
    $let
  })
});
function napraviCeneUnos(brcena) {
  let ispis=``;
  for(let i=1;i<=brcena;i++)
  {
    ispis+=`<div class="col-md-3">
                <div class="form-group">
                  <label for="inputEstimatedBudget">Količina (1000 g/ml)</label>
                  <input type="number" id="kolicina${i}" name="kolicina${i}" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="inputEstimatedBudget">Cena</label>
                  <input type="number" id="cena${i}" name="cena${i}" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="inputEstimatedBudget">Cena popust</label>
                  <input type="number" id="cena_popust${i}" name="cena_popust${i}" class="form-control">
                </div>
              </div>
              <div class="col-md-3" style="display: flex;align-items: center;justify-content: center;">
                <div class="form-group">
                  <label for="inputEstimatedBudget">Glavna cena</label>
                  <input type="radio" id="glavna_cena${i}" name="glavna_cena" class="" value="${i}">
                </div>
              </div>`;
  }

  $(".cenaostali").append(ispis);

}
