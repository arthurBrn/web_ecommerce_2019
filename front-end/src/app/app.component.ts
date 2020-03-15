import { Component } from "@angular/core";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})

export class AppComponent {

  title = "my-dream-app";
  
  constructor(public httpClient: HttpClient) {}

    sendGetRequest() {
    var list = [];
    this.httpClient
      .get("http://localhost:8000/api/products")
      .subscribe(res => {
        res['hydra:member'].forEach(line => {
              list.push({
                  id: line.id,  
                  name: line.name,
                  description: line.description,
                  picture: line.listingPicture
              });
          });
      });
      return list;
  }
}
