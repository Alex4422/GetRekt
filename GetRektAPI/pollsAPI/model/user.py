'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models

class user(models.Model):
    '''
    classdocs
    '''
    pseudo = models.CharField(max_length=50)
    email = models.EmailField(max_length=70,blank=True)
    motDePasse = models.CharField(max_length=300)              
    administrateur = models.BooleanField()
    dateDeCreation = models.DateTimeField('date de creation du user')

    def __str__(self):
        return self.pseudo + self.email + self.administrateur + self.dateDeCreation
        