import { Component, OnInit, Input } from "@angular/core";

@Component({
  selector: "app-display-products",
  templateUrl: "./display-products.component.html",
  styleUrls: ["./display-products.component.css"]
})
export class DisplayProductsComponent implements OnInit {
  @Input() categorie: string;

  constructor() {}

  ngOnInit(): void {
    this.categorie = "All categories";
  }
}
