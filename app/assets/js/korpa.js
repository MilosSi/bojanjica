$(document).ready(function () {
    if(narudzbe!=null)
    {
        popuniKorpu(narudzbe);
        ukupnoZaPlacanje(narudzbe);
    }
    else
    {
        $("#koorpa").css('display','none');
        $("#praz").css('display','flex');
    }

    $(".ukloniprod").click(function (e) {
        e.preventDefault();
        let idP=$(this).data('idp');
        let parent=$(this).parent().parent();
        deleteOrder(idP,parent);
        location.reload();
    })

    $(".kolicina").change(function () {
        let kolicina=$(this).val();
        let idP=$(this).data('idp');
        let parent=$(this).parent().parent().parent();

        if(kolicina>0)
        {
            updateOrder(narudzbe,kolicina,idP);
            location.reload();
        }
        else
        {
            deleteOrder(idP,parent);
        }

    })




});

function popuniKorpu(data) {
    let ispis=``;
    data.forEach(function (element) {
        let kratkiOpis=element.opis.split(".");
        ispis+=`
            <tr class="text-center">
                <td class="product-remove"><a href="#" class="ukloniprod" data-idp="${element.idProizovda}"><span class="ion-ios-close"></span></a></td>
    
                <td class="image-prod"><div class="img" style="background-image:url(app/assets/images/proizvodi/${element.putanja});"></div></td>
    
                <td class="product-name">
                    <h3>${element.naziv}</h3>
                    <p>${kratkiOpis[0]}</p>
                </td>
    
                <td class="price">${element.cenaP} DIN</td>
    
                <td class="quantity">
                    <div class="input-group mb-3">
                        <input type="text" name="quantity"  class="quantity form-control input-number kolicina" value="${element.kolicinaP}" min="1" max="100" data-idp="${element.idProizovda}">
                    </div>
                </td>
            
                <td class="total">${element.cenaP*element.kolicinaP}</td>
            </tr><!-- END TR-->
        `;
    });

    $("#korpapopuni").html(ispis);
}

