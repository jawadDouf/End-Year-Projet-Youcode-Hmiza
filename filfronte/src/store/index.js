import { createStore } from 'vuex'
import axios from 'axios';
import router from '@/router';
export default createStore({
  state: {
    products : [],
    authCond : 0,
    navSwitcher : undefined,
    actor : undefined,
    navSearch : true,
    user : {
      nom : null,
      prenom : null,
      email : null,
      password : null,
      confirm_password : null,
      img : null
    },
    business : {
      business_nom : null,
      business_location : null,
      business_email : null,
      business_password : null,
      confirm_password : null,
      business_profileImage : null,
      business_adresse : null,
      business_profession : null,
      business_sousprofession : null,
      business_description : null
    },
    blockPage : 1,
    bringCond : false

  },
  getters: {
    
  },
  mutations: {
    fillProducts(state,product){
        state.products.push(product);
    },
    search(state,loader){
      state.search = loader;
    },
    changeNav(state,loader){
      state.navSwitcher = loader
    },
    changeAuth(state,loader){
      state.authCond = loader;
    },
    changeSearch(state,loader){
      state.navSearch = loader
    },
    // modify user Object
    modifyUser(state,user){
      state.authCond = 3;
      state.user.nom = user.nom;
      state.user.prenom = user.prenom;
      state.user.email = user.email;
      state.user.password = user.password;
      state.user.confirm_password = user.confirm_password;
      
    },
    modifyEmailPass(state,user){
      state.user.email = user.email;
      state.user.password = user.password;
    },
    modifyImg(state,img){
      state.user.img = img
    },
    modifyFirst(state,business){
       state.authCond = -3;
       state.business.business_email = business.business_email 
       state.business.business_password = business.business_password
       state.business.confirm_password = business.confirm_password
    },
    modifyBusinessSecond(state,business){
      state.authCond = -4;
      state.business.business_location = business.business_location
      state.business.business_adresse = business.business_adresse
      state.business.business_nom = business.business_nom
   },
   modifyBusinessImg(state,img){
    state.business.business_profileImage = img
  },
  modifyBusinessThird(state,business){
    state.authCond = -5;
    state.business.business_profession  = business.business_profession  
    state.business.business_sousprofession= business.business_sousprofession
 },
 modifyDescription(state,description){
  state.business.business_description  = description 
 },
 changeBlockPage(state,loader){
   state.blockPage = loader
 },
 modifybringEl(state,loader){
   state.bringCond = loader
 }

  },
  actions:{
      getProducts({ commit },toSearchWith = "d"){ 
        if(toSearchWith.length == 0){
          toSearchWith = "d"
        }
        this.state.products = [];
        axios
        .get('http://localhost/folderr/produitApi/produitsSearch/' + toSearchWith)
        .then(response => (response.data.forEach(element => {
             commit('fillProducts',element);
        }))).then(()=> {
          if(toSearchWith === "d" ){
            localStorage.setItem("lastId",this.state.products[this.state.products.length-1].produit_id)
          }
        })
      },

   async addUser({commit}){
      //  commit('modifyUser',user),
       console.log(this.state.user.email)
        var formData = new FormData()
        formData.append('nom',this.state.user.nom)
        formData.append('prenom',this.state.user.prenom)
        formData.append('email',this.state.user.email)
        formData.append('password',this.state.user.password)
        formData.append('confirm_password',this.state.user.confirm_password)
        formData.append('img',this.state.user.img)
       await axios.post('http://localhost/folderr/utilisateureApi/AddUser', formData)
          .then(function (response) {
            console.log("formData"),
            console.log(response),
            commit('changeAuth',1)
          })
          .catch(function (response) {
            console.log(response);
          });
        
      },
      async addBusiness({commit},description){
        commit('modifyDescription',description)
        var formData = new FormData()
        console.log(this.state.business)
        formData.append('business_nom',this.state.business.business_nom)
        formData.append('business_location',this.state.business.business_location)
        formData.append('business_email',this.state.business.business_email)
        formData.append('business_password',this.state.business.business_password)
        formData.append('confirm_password',this.state.business.confirm_password)
        formData.append('business_profileImage',this.state.business.business_profileImage)
        formData.append('business_adresse',this.state.business. business_adresse)
        formData.append('business_sousprofession',this.state.business.business_sousprofession)
        formData.append('business_profession',this.state.business.business_profession)
        formData.append('business_description',this.state.business.business_description)
       await axios.post('http://localhost/folderr/BusinessApi/AddBusiness', formData)
          .then(function (response) {
            console.log(formData),
            console.log(response),
            commit('changeAuth',-1)
          })
          .catch(function (response) {
            console.log(response);
          });


      }
     
  
    
  },
  modules: {
  }
})
