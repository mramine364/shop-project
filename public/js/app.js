

let app = new Vue({
    el: '#nav',

    methods:{
        Logout(){            
            document.getElementById('frm-logout').submit();
        }
    }
})