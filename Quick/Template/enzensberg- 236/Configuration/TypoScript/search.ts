
lib.search = TEXT
lib.search.value (
	<form name="tx_indexedsearch" method="post" action="index.php?id=48">
	<label class="label-clr">{$search.title}</label>
    <input type="text" id="tx_indexedsearch[sword]" name="tx_indexedsearch[sword]" class="form-control search-bx" value="" placeholder="{$search.placeholder}" /><input class="submit-btn-tgl" type="submit" name="suchen" value="{$search.submit}"  />
    <input type="hidden" value="0" name="tx_indexedsearch[_sections]">
    <input type="hidden" value="0" name="tx_indexedsearch[pointer]">
    <input type="hidden" value="0" name="tx_indexedsearch[ext]">
    <input type="hidden" value="_" name="tx_indexedsearch[_freeIndexUid]">
  </form>
)


plugin.tx_indexedsearch.show {
      advancedSearchLink = 0
      rules = 0
}


### Footer Contact 
content.QuickSearch = CONTENT
content.QuickSearch.table =  tt_content
content.QuickSearch.select.pidInList = 40
content.QuickSearch.select.uidInList = 2011 