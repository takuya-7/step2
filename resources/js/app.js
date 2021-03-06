require('./bootstrap');

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import List from './components/list/List.vue'
import ParentStep from './components/step/ParentStep.vue'
import ChildStep from './components/step/ChildStep.vue'
import ChildStepList from './components/step/ChildStepList.vue'
import ChallengeSteps from './components/step/ChallengeSteps.vue'
import RegisteredSteps from './components/step/RegisteredSteps.vue'
import Profile from './components/Profile.vue'
import LoginForm from './components/form/LoginForm.vue'
import RegisterForm from './components/form/RegisterForm.vue'
import StepForm from './components/form/StepForm.vue'
import ChildStepForms from './components/form/ChildStepForms.vue'
import BlueWidth100Button from './components/button/BlueWidth100Button.vue'
import ChallengeButton from './components/button/ChallengeButton.vue'
import ClearButton from './components/button/ClearButton.vue'
import UserInformation from './components/user/UserInformation.vue'

createApp({
    components:{
        ExampleComponent,
        List,
        ParentStep,
        ChildStep,
        ChildStepList,
        ChallengeSteps,
        RegisteredSteps,
        Profile,
        LoginForm,
        RegisterForm,
        StepForm,
        ChildStepForms,
        BlueWidth100Button,
        ChallengeButton,
        ClearButton,
        UserInformation,
    }
}).mount('#app')


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

 // ??????????????????????????????
document.querySelector('.js-toggle-sp-menu').addEventListener('click', function(){
    this.classList.toggle('js-active');
    document.querySelector('.js-toggle-sp-menu-target').classList.toggle('js-active');
});