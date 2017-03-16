from django.conf.urls import url, include
from pollsAPI import views
from rest_framework.routers import DefaultRouter
from rest_framework.schemas import get_schema_view
from rest_framework.urlpatterns import format_suffix_patterns

schema_view = get_schema_view(title='Polls API')

# Create a router and register our viewsets with it.
router = DefaultRouter()
router.register(r'questions', views.QuestionViewSet)
router.register(r'choices', views.ChoiceViewSet)
router.register(r'video', views.VideoViewSet)
router.register(r'commentaire', views.CommentaireViewSet)
router.register(r'categorie', views.CategorieViewSet)
router.register(r'vote', views.VoteViewSet)
router.register(r'users', views.UserViewSet)

user_exist = views.UserViewSet.as_view({
    'post' : 'exist'
})

user_connect = views.UserViewSet.as_view({
    'post' : 'connect'
})

vote_for_video = views.VoteViewSet.as_view({
    'post' : 'voteforvideo',
    'delete' : 'voteforvideo'
})


# The API URLs are now determined automatically by the router.
# Additionally, we include the login URLs for the browsable API.
urlpatterns = [
    url('^schema/$', schema_view),
    url(r'^', include(router.urls)),
    url(r'^user/exist', user_exist, name='user_exist'),
    url(r'^user/connect', user_connect, name='user_connect'),
    url(r'^vote/voteforvideo', vote_for_video, name='vote_for_video'),
    url(r'^api-auth/', include('rest_framework.urls', namespace='rest_framework'))
]
