window.addEventListener('load', async () => {
$('#guestbook-form').on('submit', async (event) => {
  // prevent refreshing of the page
  event.preventDefault();
  printf("TEST")
  await saveData()
  // Empty the table
  $('table').find("tr:gt(0)").remove();

  // get data from server
  getData();
})
})
// responser.await()
//   document.getElementById('result').innerHTML = `Vorname: ${jsonData.vorname} Nachname: ${jsonData.nachname} email: ${jsonData.email}`
