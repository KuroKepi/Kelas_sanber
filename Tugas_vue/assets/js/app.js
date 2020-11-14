new Vue({
    el:'#app',
    data:{
        komentar : [{
            title : "komentar 1",
            date: new Date(),
            score : 1
        },
        {
            title : "komentar 2",
            date : new Date('DD-MM-YYYY'),
            score : 2
        }],
        textarea:''
    },
    methods : {
        listcomment: function(){
            this.komentar.push({
                title : this.textarea,
                score : 0
            })
                this.textarea = "";
            }
    }
})
