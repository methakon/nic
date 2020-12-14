if(typeof this.NodeList.prototype.forEach != undefined )
{
    this.NodeList.prototype.forEach = Array.prototype.forEach;
}
class registration
{
     constructor() { 
         
         this.auther="SWARNA SEKHAR DHAR";
         document.reg=this;
         this.initialise();
     } 
     initialise()
     {
         
         $('#r_dob').datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1900:' + new Date().getFullYear().toString()
          });
         $('#r_dob').change(function () {
             var dob = new Date($('#r_dob').val());
             
             console.log(document.reg.calculateAge(dob));
             u_registration.age.value= document.reg.calculateAge(dob);
         });
          $("#r_photo").change(function(){
              if(!document.reg.photo_validate())
              {
                  u_registration.photo.value=""; 
              }
         });
         $( "#reload_captcha" ).click(function() {
                document.reg.reload_captcha();
          });
     }
    calculateAge(birthday) {  
        var ageDifMs = Date.now() - birthday.getTime();
        var ageDate = new Date(ageDifMs); // miliseconds from epoch
        return Math.abs(ageDate.getUTCFullYear() - 1970);
    }
    photo_validate()
    {
        var ext= u_registration.photo.value.split('.').pop();
        if(!["jpg", "jpeg"].includes(ext))
        {
            $(u_registration.photo).notify(
                    "Invalid file type", 
                     { position:"right",  style: 'bootstrap',className: 'error' }
             );
             return false;
        }
        var size = Math.floor(u_registration.photo.files[0].size/1000);
        if(size > 100)
        {
            $(u_registration.photo).notify(
                     "File size grater than allowed", 
                     { position:"right",  style: 'bootstrap',className: 'error' }
             );
             return false;
        }
       return true;  
    }
    reload_captcha()
    {
         $.ajax({url: base_url+"index.php/index/get_captcha", success: function(result){
                 console.log(result);
              $("#captcha_div").html(result);
            }});
    }
 }
  
  
  
  
$(document).ready(function() {
   new registration;    
});