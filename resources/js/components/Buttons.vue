<template>
  <div class="contianer row mt-3">
          <div class="text-left col-md-6 d-block numbers" role="group" aria-label="Basic example">
            <button v-on:click="clearDisplay()" value="AC" type="button" class="btn btn-secondary">AC</button>
            <button v-on:click="getvalue($event)" value="1" type="button" class="btn btn-secondary">1</button>
            <button v-on:click="getvalue($event)" value="2" type="button" class="btn btn-secondary">2</button>
            <button v-on:click="getvalue($event)" value="3" type="button" class="btn btn-secondary">3</button>
            <button v-on:click="getvalue($event)" value="4" type="button" class="btn btn-secondary">4</button>
            <button v-on:click="getvalue($event)" value="5" type="button" class="btn btn-secondary">5</button>
            <button v-on:click="getvalue($event)" value="6" type="button" class="btn btn-secondary">6</button>
            <button v-on:click="getvalue($event)" value="7" type="button" class="btn btn-secondary">7</button>
            <button v-on:click="getvalue($event)" value="8" type="button" class="btn btn-secondary">8</button>
            <button v-on:click="getvalue($event)" value="9" type="button" class="btn btn-secondary">9</button>
          </div>
          <div class="text-left col-md-5 d-block action-buttons" role="group" aria-label="Basic example">
            <button v-on:click="getvalue($event)" value="x" type="button" class="btn btn-secondary">x</button>
            <button v-on:click="getvalue($event)" value="-" type="button" class="btn btn-secondary">-</button>
            <button v-on:click="getvalue($event)" value="/" type="button" class="btn btn-secondary">/</button>
            <button v-on:click="getvalue($event)" value="+" type="button" class="btn btn-secondary">+</button>
            <button v-on:click="handleoperation()" type="button" class="btn btn-secondary">=</button>
            <button v-on:click="getvalue($event)" value="." type="button" class="btn btn-secondary">.</button>
            <button v-on:click="getvalue($event)" value="0" type="button" class="btn btn-secondary">0</button>
          </div>
  </div>
</template>

<script>
export default {
name:'Buttons',
data(){
    return{
        currentnumber:'',
        previoustate:null,
        result:null,
        operator:null,
    }
},
methods:{
    clearDisplay () {
      this.$emit('clear','clear');
      this.currentnumber = ''
      this.previoustate = null
      this.operator = null
    },
    getvalue(e){

          var val = e.target.value;
          
          if(!isNaN(val))
          {
            if(this.operator!=null)
            {
              this.$emit('details',val);
            }
            else{
              this.$emit('details',val);
              this.currentnumber=val;
            }
          }
          else if(val==='-' || val==='+' || val==='/' || val==='x'){
             this.$emit('opi',val);
             this.operator = val;
          }
    },
    handleoperation(){
          this.$emit('handleoperation','go');      
    }
},
mounted(){
    console.log(this.$refs.numbers);
}
}
</script>

<style scoped>
button{
   width: 40px;
   margin: 2px;
}

</style>