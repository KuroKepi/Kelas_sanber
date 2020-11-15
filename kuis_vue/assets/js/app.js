new Vue({
    el:'#app',
    data:{
        users : [{
            nama : "Kukuh Yoga ",
           
        },
        {
            nama : "Rizki Ananda",
        }],
        blank:'',
        id: '',
        update: false
    },
    methods : {
        tambah: function(){
            this.users.push({
                nama : this.blank,
            })
                this.blank = "";
            },
        hapus: function(user)
        {
            var result = confirm("Anda ingin menghapus data user ?");
            if(result){
                this.index = this.users.indexOf(user);
                this.users.splice(this.index,1);
            }
        },
        edit: function(user,name)
        {
            this.update = true;
            this.id = user;
            this.blank = name;
        },
        updatee: function(user,name)
        {
            this.users[user].nama = name;
            this.blank =" ";
            this.update = false;
        },
    }
});
