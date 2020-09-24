<template>
    <div>
        <div class="list_pages">
            <label>Strona: <input required type="text" name="page_name[1]" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input required type="text" name="page_title[1]" placeholder="Nazwa strony" class="mr-2"><input type="button" class="add_subpage" value="add sub page" v-on:click="addSubPage"></label><br>
        </div>
        <div>
            <input class="btn btn-primary" value="Dodaj kolejną stronę" v-on:click="addPage">
        </div>
    </div>
</template>

<script>
var start = 2;
export default {
    //define methods under the `methods` object
    methods: {
        addPage: function (event) {
            $('.list_pages').append('<label>Strona: <input required type="text" name="page_name['+start+']" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input type="text" name="page_title['+start+']" placeholder="Nazwa strony" class="mr-2"></label><input type="button" class="add_subpage" value="add sub page"><br>')
        },
        addSubPage: function(event) {
            $('.list_pages').append('<label>Strona: <input required type="text" name="page_name['+start+']" placeholder="Link np. /oferta lub http://allegro.pl" class="mr-2"><input type="text" name="page_title['+start+']" placeholder="Nazwa strony" class="mr-2"></label><input type="button" class="add_subpage" value="add sub page"><br>')
        }
    }
}
</script>
