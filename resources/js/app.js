require('./bootstrap');
import Vue from 'vue'

const app = new Vue({
    el: '#app',
    data : {

        salles : [],
        lol : "llol",
        date_debut: "",
        date_fin: "",

    },
    mounted() {
        // alert("lol");
        this.getsalles();
    },
    
    methods : {
        triesalle(){
            alert("lol")
        },
        
        getsalles(){
            axios.get('/api/salles')
            .then((response) => {
                this.salles = response.data;
                // console.log(response.data);
            })
            .catch(function(error){
                console.log(error);
            })
        },
        loginForm(e){
            // console.log(this.$refs.form);

            this.champ_passe_vide = this.passe.length==0?true:false;
            this.champ_mail_vide = this.mail.length==0?true:false;
            if(this.champ_mail_vide || this.champ_passe_vide){
                e.preventDefault();
             }
            else{
                this.$refs.form.submit;
           

             }
        },
    }
});