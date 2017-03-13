'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models

class categorie(models.Model):
    
    nom = models.CharField(max_length=50)
    
    def __str__(self):
        return self.nom