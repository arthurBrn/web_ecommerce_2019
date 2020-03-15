import { Component, OnInit, Output, EventEmitter } from "@angular/core";
import { FormBuilder } from "@angular/forms";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: "app-side-bar",
  templateUrl: "./side-bar.component.html",
  styleUrls: ["./side-bar.component.css"]
})
export class SideBarComponent implements OnInit {
  oppoSuits: any = [];
  @Output() categories = new EventEmitter<string>();

  constructor(public fb: FormBuilder, public httpClient: HttpClient) {}

  oppoSuitsForm = this.fb.group({
    name: [""]
  });

  getCategories() {}

  ngOnInit(): void {
    this.httpClient
      .get("http://localhost:8000/api/categories")
      .subscribe(res => {
        res["hydra:member"].forEach(line => {
          this.oppoSuits.push(line.name);
        });
      });
  }

  onChange(deviceValue) {
    // console.log(deviceValue);
    this.categories.emit(deviceValue);
  }
}
