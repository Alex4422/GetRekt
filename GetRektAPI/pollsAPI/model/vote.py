'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
from datetime import datetime

class vote(models.Model):
    '''
    classdocs
    '''

    dateDeCreation = models.DateTimeField('date de creation du vote')

    def __str__(self):
        return self.dateDeCreation
        