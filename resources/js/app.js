import "filepond/dist/filepond.min.css";
import * as FilePond from 'filepond';
import Typewriter from '@marcreichel/alpine-typewriter';
// import Alpine from "alpinejs";
import.meta.glob([
    '../images/**'
]);
Alpine.plugin(Typewriter);
// Alpine.start();
document.addEventListener("alpine:init",()=>{
    Alpine.data("notifier",()=>({
        renderNotify(htmls,divId) {
            document.getElementById(`notifications_${divId}`).innerHTML=htmls;
        }
    }));
Alpine.data('sounds',()=>({
     test() {
       console.log("giiiii");
    }
}));

Alpine.store('informations',{
   postType:'public',
   newTags: "jh"
});
Alpine.store('formsData',{
        registerDiv:document.getElementById('register'),
        loginDiv:document.getElementById('login'),
        imageDiv:document.getElementById('imgDiv'),
        parDiv:document.getElementById('partial-image')
    });
    Alpine.data('forms', () => ({
        toLogin() {
            this.$store.formsData.registerDiv.style.cssText="transform:translateX(100%); opacity:0";
            setTimeout(() => {
                 this.$store.formsData.imageDiv.style.cssText="left:75%";   
              setTimeout(() => {
                
                  this.$store.formsData.parDiv.style.cssText='transform:translateX(90%)';
              }, 200);
            }, 500);
            setTimeout(() => {
                    this.$store.formsData.loginDiv.style.cssText="transform:translateX(0%); opacity:1 "
            }, 1000);
        },
        toRegister() {
            this.$store.formsData.loginDiv.style.cssText="transform:translateX(-100%); opacity:0 "
            setTimeout(() => {
                this.$store.formsData.imageDiv.style.cssText="left:25%";   
                setTimeout(() => {
                
                    this.$store.formsData.parDiv.style.cssText='transform:translateX(0%)';
              }, 200);
            }, 500);
            setTimeout(() => {
                this.$store.formsData.registerDiv.style.cssText="transform:translateX(0%); opacity:1";
            }, 1000);
        }
    }));
});
