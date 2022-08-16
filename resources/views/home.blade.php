@extends('layouts.app')

@section('content')

<button id="getquotes" class="btn btn-primary" style="margin-left:15px">Generate Quotes</button>

<h1 style="margin-left:40% !important;margin-bottom:40px !important;">Kayne Quotes</h1>
<div id="quotes"> 


</div>
                    
@endsection


@section('script')
<script>
$(document).ready(function(){

                  
               let div= $('#quotes');

               for(var i=0;i<=4;i++)
               {
                   $.ajax({
                       type:'get',
                       url: 'https://api.kanye.rest/',
                       success:function(data){ 
                           
                           div.append('<p class="single-quote">" '+data.quote+' "</p>');
                           
                         }       
                    });
               }

              $('#getquotes').on('click',function(){   
                      
                    $.ajax({
                       type:'get',
                       url: '/api/quotes',
                       data:{"_token": "{{ csrf_token() }}"},
                       success:function(data){ 
                            div.empty()
                            for(let i=0;i<data.quotes.length;i++){
                               div.append('<p class="single-quote">" '+data.quotes[i]+' "</p>');
                            }
                         }       
                    });
               });

                
                   


});


</script>
@endsection



