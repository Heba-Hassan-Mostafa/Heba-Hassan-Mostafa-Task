<?php 


// lang
      function lang()
      {
        if(session()->has('lang'))
        {
            return session('lang');
        }
        else
        {
           return 'ar';
        }
      }
    

       //direction of design 
    
       function direction()
      {
          if (session()->has('lang')) 
        {    
         if (session('lang') == 'ar') 
           {
          return 'rtl';
          }
          else
          {
           return 'ltr';
          }
          }
          
          else
          {
           return 'rtl';
       }
          
      }
      
   
