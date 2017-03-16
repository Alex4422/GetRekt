from django.contrib import admin
#from GetRekt.pollsAPI.models import categorie, commentaire, user, video, vote
#from models.categorie import *

from pollsAPI.model.Categorie import *
from pollsAPI.model.Commentaire import *
from pollsAPI.model.User import *
from pollsAPI.model.Video import *
from pollsAPI.model.Vote import *


# Register your models here.

admin.site.register(Categorie)
admin.site.register(Commentaire)
admin.site.register(User)
admin.site.register(Video)
admin.site.register(Vote)