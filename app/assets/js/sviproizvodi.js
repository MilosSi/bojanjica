$(document).ready(function () {
    $("#submitPretraga").click(function () {
        let vrednost=$("#pretraga").val();
        $.ajax({
            type:"POST",
            url:"index.php?page=ajaxpretraga",
            data:{
                vrednost
            },
            success:function(podaci,jq,kod)
            {
                let data=JSON.parse(podaci)
                console.log(data);
                napraviProizvode(data);
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        })
    })


    $("#submitFilter").click(e=>{
        e.preventDefault();
        let nizCbx=[];
        $("input:checkbox[name=kategorija]:checked").each(function() {
            nizCbx.push($(this).val());
        });
        let minVrednost=$(".minVre").val();
        let maxVrednost=$(".maxVre").val();

        if(nizCbx.length==0)
        {
            nizCbx=[1,2,3,4];
        }

        $.ajax({
            type:"POST",
            url:"index.php?page=ajaxfilteri",
            data:{
                nizCbx,
                minVrednost,
                maxVrednost
            },
            success:function(podaci,jq,kod)
            {
                let data=JSON.parse(podaci)
                console.log(data);
                napraviProizvode(data);
            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        })

    })
})

function napraviProizvode(data)
{
    let ispis=``;
    data.forEach(function (element) {
        ispis+=`
          <div class="col-md-6 col-lg-4 ">
                    <div class="product">
                        <a href="index.php?page=proizvod&idp=${element.id}" class="img-prod" style="min-height: 202px"><img class="img-fluid" src="app/assets/images/proizvodi/${element.putanja}" alt="${element.alt}" title="${element.alt}">`;
                        if(element.cena_popust!=null){

                                let procenat=(element.cena_popust*100)/element.cena;
                                let popustProcenat=100-procenat;
                                popustProcenat=Math.round(popustProcenat);
                                ispis+=`  <span class="status">${popustProcenat}%</span>
                                <div class="overlay"></div>`;

                        }
                        ispis+=`
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3 style="min-height: 42px;"><a href="index.php?page=proizvod&idp=${element.id}">${element.naziv}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">`;
                                    if(element.cena_popust!=null){
                                        ispis+=`<p class="price"><span class="mr-2 price-dc">${element.cena} DIN</span><span class="price-sale">${element.cena_popust}</span></p>`;
                                    }
                                    else{
                                        ispis+=`<p class="price"><span>${element.cena} DIN </span></p>`;
                                    }
                                ispis+=`
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="index.php?page=proizvod&idp=${element.id}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        `;
    })

    $(".ajaxispis").html(ispis);
    $(".ajaxvis").css('display','none');
}