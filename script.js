function getTitleCards() {
    const proxyUrl = "https://cors-anywhere.herokuapp.com/";
    const targetUrl = "https://imgur.com/a/adventure-time-title-cards-1920x1080-oPhjP";
  
    fetch(proxyUrl + targetUrl)
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.error("Erro:", error);
      });
  }
  
  getTitleCards();