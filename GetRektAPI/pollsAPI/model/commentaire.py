'''
Created on Mar 11, 2017

@author: alex
'''

from django.db import models
import datetime


class commentaire(object):
    '''
    classdocs
    '''

    message = models.CharField(max_length=200)
    dateDeCreation = models.DateTimeField('date de creation du commentaire')

    def __str__(self):
        return self.message
        