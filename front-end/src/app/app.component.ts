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
    this.httpClient
      .get("http://localhost:8000/api/products")
      .subscribe(res => {
        console.log(res);
      });
  }
}