import Prism from 'prismjs';

export default {
    methods: {
        highlight (id = "") {
            const el = this.$refs.bodyHtml;
            

            if (el) 
               Prism.highlightAllUnder(el);
        }
    }
}
