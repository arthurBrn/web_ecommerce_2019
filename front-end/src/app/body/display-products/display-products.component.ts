import { Component, OnInit, Input } from "@angular/core";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: "app-display-products",
  templateUrl: "./display-products.component.html",
  styleUrls: ["./display-products.component.css"]
})
export class DisplayProductsComponent implements OnInit {
  @Input() categorie: string;
  products: any = [];
  categories: any = [];
  baseUrlApi: string = "http://localhost:8000";
  show_products: any = [];

  constructor(public httpClient: HttpClient) {}

  ngOnChanges(changes: any) {
    for (let oneCategorie of this.categories) {
      if (this.categorie == oneCategorie.id) {
        if (oneCategorie.products.length > 0) {
          this.fill_product_list(oneCategorie.products);
          console.log(this.show_products);
        }
      } else {
        //   display tout les produits
      }
    }
  }

  fill_product_list(products): void {
    products.forEach(product => {
      this.httpClient.get(this.baseUrlApi + product).subscribe(res => {
        console.log(res);
        // this.show_products.push({
        //   id: res.id,
        //   name: res.name,
        //   description: description,
        //   picture: listingPicture
        // });
      });
    });
  }

  ngOnInit(): void {
    this.httpClient.get(this.baseUrlApi + "/api/products").subscribe(res => {
      res["hydra:member"].forEach(line => {
        this.products.push({
          id: line.id,
          name: line.name,
          description: line.description,
          picture: line.listingPicture
        });
      });
    });
    console.log(this.products);
    this.httpClient.get(this.baseUrlApi + "/api/categories").subscribe(res => {
      res["hydra:member"].forEach(line => {
        this.categories.push({
          id: line.id,
          name: line.name,
          products: line.products
        });
      });
    });
    console.log(this.categories);
  }
}
