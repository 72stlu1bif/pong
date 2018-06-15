window.addEventListener('load', async () => {
  document.getElementById('submit').addEventListener('click', async (event) => {
    event.preventDefault()
    const formData = new FormData(document.getElementById('guestbook-form'));
    //DBInsert
    try {
      const responser = await fetch('dbInsert.php', {
        method: 'post',
        body: formData
      });
    } catch (err) {
      console.log(err)
    }
    //json holen
    const response = await fetch('transformText.php', {
      method: 'post',
      body: formData
    });
    //error handling für json
    const jsonData = await response.json()
    if (typeof jsonData.error !== 'undefined') {
      printf("fehler");
      document.getElementById('result').innerHTML = jsonData.error
    } else {
      $('table').children().append(`<tr><td>${jsonData.name}</td></tr>`)
      // jsonData.forEach((user) => {
      //   $('table').children().append(`<tr><td>${user.vorname}</td><td>${user.nachname}</td><td>${user.email}</td><td>HALLO</td></tr>`)
      // })
    }
    // const responsey = await fetch('fulloutput.php', {
    //   method: 'post',
    //   body: formData
    // });
  })
})
