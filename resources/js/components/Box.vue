<template>
    <div class="container">
         <input class="form-control" :value="currentstate" type="disabled">
         <Buttons 
          v-on:handleoperation="result($event)"
          v-on:clear="clearDisplay($event)"
          v-on:details="heyman($event)"
          v-on:opi="getoperator($event)"  />        
    </div> 
</template>

<script>
import Buttons from './Buttons.vue'
export default {
    name:'Box', 
    props:[],
    data(){
        return{
            previoustate:null,
            currentstate:'',
            operator:null,
            answer:null
        }
    },
    components:{Buttons},
    methods:{
     heyman(bang){
         if(this.currentstate=='0')
         {
             this.currentstate='';
         }
         this.currentstate+=bang;
     },
     getoperator(opera){
         this.previoustate=this.currentstate;
         this.currentstate='';
         this.operator=opera;
     },
     clearDisplay(aewen){
         this.previoustate=null;
         this.currentstate='0';
         this.operator=null;
     },
     result(){
        switch (this.operator) {
        case '+':
          return this.answer = this.previoustate + this.currentstate;
        case '-':
          return this.currentstate = this.previoustate - this.currentstate;
        case 'x':
           this.currentstate = this.previoustate * this.currentstate;
           
           if(this.currentstate > 999999999999999999n)
           {
               return this.currentstate='error value to big cant process';
           }
           return this.currentstate;
        
        case '/':
          return this.currentstate = this.previoustate / this.currentstate;
        default:
          return this.currentstate;
      } 
     }
}
}
</script>

<style>
input{
    width: 84% !important;
}

</style>