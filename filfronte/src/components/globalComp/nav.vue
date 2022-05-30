<template>
<div class="nav">
 <img class="img" src="../../assets/Group3.png" alt="">
 <ul class="ul">
    <li>Acceuil</li>
    <li>Produits</li>
    <li>Profile</li>
    <li>About</li>
  </ul>  
    <!-- <li><button :class="index.button">   
    Register
    </button></li> -->
   
   <div class="search_box" id="search_box">
    <fa :icon="['fas','search']" class="search_box__icon" @click="activateSearch"/>
    <input class="search_box__input" placeholder="Título, personas, generos"/>
    </div>
 </div>
  
  <!-- <div class="cover">
    <div class="cover-leftSide">
     <h1>Samsung Galaxy Note 10+ with<br>256 GB (U.S. Warranty), Aura<br> Black/ Note10+ (Renewed)</h1>
     <p>Contrary to popular belief, Lorem Ipsum is not<br> simply random text. It has roots in a piece of<br>classical Latin literature from 45 BC, making it<br>  has roots in a piece of classical Latin literature<br> from 45 BC, making it </p>
     <button>Check the product</button>
    </div>
    <div class="cover-rightSide">
    
    <img src="../../../../backend/public/Img/coverFirstImage.png" alt="phone image" />
    <div class="nav-prices">
  <div class="onePrice">
  <fa :icon="['fab','amazon']" class="amazon"/>
  <p>:300$</p>
  </div>
  <div class="onePrice">
  <fa :icon="['fab','shopify']" class="amazon"/>
  <p>:300$</p>
  </div>
  <div class="onePrice">
  <fa :icon="['fab','ebay']" class="amazon"/>
  <p>:300$</p>
  </div>
  <div class="onePrice">
  <fa :icon="['fab','apple']" class="amazon"/>
  <p>:300$</p>
  </div>
  <div class="onePrice">
  <fa  :icon="['fab','amazon']" class="amazon"/>
  <p>:300$</p>
  </div>
  </div>
    </div>
 
  </div>
   <br>
  </div> -->
 

</template>

<script setup>


</script>
<style lang="scss">
@import "@/sass/variables.scss";
@import "@/sass/mexins.scss";
@import "@/sass/mediaquerise.scss";
.router{
 text-decoration: none;
 color:$primary-color;
}
.nav{
    font-family: $primary-font;
    background-color: hsla(225, 50%, 35%, 1);
    width: 100%;
    margin: auto;
    border-radius: 0;
    margin-top:0px;
    @include flex($direction:row,$justify-content:flex-start);
    gap: 12%;
    padding-block:15px;
ul{
     font-weight: 500;
     list-style: none;
     @include flex($direction:row,$justify-content:flex-start);
     gap: 35%;
     color: white;

li{
    cursor: pointer;
}


}}
.img{
    width:140px;
    height: auto;
    padding-left: 30px;
}
.search_box{
    position: relative;
    width: 250px;
  }
    
  
.search_box__input {
      outline: none;
      background: rgba(0,0,0,0.85);
      border: solid 1px rgba(255,255,255,0.85);
      box-sizing: border-box;
      padding: 7px 14px 7px 40px;
      width: 0%;
      font-size: 13px;
      color: #fff;
      opacity: 0;
      transition: ease width 1s, ease opacity 1s;
      float: right;
  }
      
  
.search_box__icon{
      position: absolute;
      top: 7px;
      color: white;
      z-index: 10;
      cursor: pointer;
      right: 12px;
      transition: ease transform 1s;
      transition-delay: 50ms;
.active{
.search_box__icon{
      width:-214px;
  }
.search_box__input{
        opacity: 1;
        width: 100%;
  }
        
  
  }
  
  
}


</style>