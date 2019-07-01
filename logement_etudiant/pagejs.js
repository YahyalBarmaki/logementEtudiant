/**
 * For button Boursié
 */
var bouton1 = document.getElementById('check1');
var fomrdiv = document.getElementById('form3');
if (bouton1.checked==true) {
    fomrdiv.style.display="block";
}
else
{
    fomrdiv.style.display="none";
}
bouton1.addEventListener('change',function(){
    if (fomrdiv.style.display==="none") {
        fomrdiv.style.display="block";
    }
    else
        {
            fomrdiv.style.display="none";
        }
});
/**
 * For button NonBoursié
 */
var bouton2 = document.getElementById('check2');
var formNB = document.getElementById('adr');
if (bouton2.checked==true) {
    formNB.style.display="block";
}
else
{
    formNB.style.display="none";
}
bouton2.addEventListener('change',function()
    {
        if (formNB.style.display==="none") {
            formNB.style.display="block";
        }
        else
        {
            formNB.style.display="none";
        }
    });
    /**
     * Batiment & chambre
     */
bouton3 = document.getElementById('check1_2');
formBC = document.getElementById('btn4');
if (bouton3.checked==true) {
    formBC.style.display="block";
}
else
{
    formBC.style.display="none";
}
bouton3.addEventListener('change',function()
    {
        if (formBC.style.display==="block") {
            formBC.style.display="none";
        }
        else
        {
            formBC.style.display="block";
        }
    });   
// $(document).ready(function()
// {
//     $('#check1').click(function(){
//         $('#form3').hide();
//     })
// });