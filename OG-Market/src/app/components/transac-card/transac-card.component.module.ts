import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TransacCardComponent } from './transac-card.component';
import { IonicModule } from '@ionic/angular';

@NgModule({
  declarations: [TransacCardComponent],
  imports: [CommonModule, IonicModule],
  exports: [TransacCardComponent],
})
export class TransacCardModule {}
