export default {
    data: function() {
        return {
            jobform: window.jobform,
        }
    },
    created: function(){

    },
    mounted() {
        console.log('Mixin mounted.')
        //this.$i18n.locale = 'de';
    },
    methods: {
        textarea_rows: function(text, min = 3, max = 20) {
            let lines = ( text.match(new RegExp('\r?\n','g')) || '' ).length + 1;
            let rows = lines;
            if ( rows < min ) rows = min;
            if ( rows > max ) rows = max;
            return rows;
        }
    }
};
