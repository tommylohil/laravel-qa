import Prism from 'prismjs';

export default {
    methods: {
        highlight (id = "") {
            const el = this.$refs.bodyHtml;
            if (!id) {
                el = this.$refs.bodyHtml;
            }
            else {
                el = doocument.getElementbyId(id);
            }

            if (el) 
               Prism.highlightAllUnder(el);
        }
    }
}
