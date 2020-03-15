import { Component, OnInit, Output, EventEmitter } from "@angular/core";
import { FormBuilder } from "@angular/forms";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: "app-side-bar",
  templateUrl: "./side-bar.component.html",
  styleUrls: ["./side-bar.component.css"]
})
export class SideBarComponent implements OnInit {
  listCategories: any = [];
  @Output() categories = new EventEmitter<string>();

  constructor(public fb: FormBuilder, public httpClient: HttpClient) {}

  categoriesForm = this.fb.group({
    name: [""]
  });

  getCategories() {}

  ngOnInit(): void {
    this.httpClient
      .get("http://localhost:8000/api/categories")
      .subscribe(res => {
        res["hydra:member"].forEach(line => {
          this.listCategories.push({
            id: line.id,
            name: line.name
          });
        });
      });
  }

  onChange(deviceValue) {
    this.categories.emit(deviceValue);
  }
}
