import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Input } from '@angular/core';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {

  @Input() productNumber;

  constructor(public httpClient: HttpClient) { }

  ngOnInit(): void {
  }

  getProductDetails()
  {
    var product;
    product = this.httpClient.get("http://localhost:8000/api/products/" + this.productNumber);


  }

}
