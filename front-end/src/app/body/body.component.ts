import { Component, OnInit } from '@angular/core';
import { Input } from '@angular/core';


@Component({
  selector: 'app-body',
  templateUrl: './body.component.html',
  styleUrls: ['./body.component.css']
})

export class BodyComponent implements OnInit {

  @Input() prodList;

  constructor() { }

  ngOnInit(): void {
  }
}
